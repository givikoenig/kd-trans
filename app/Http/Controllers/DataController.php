<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ContactPageMessage;
use App\Notifications\TestimonialPageMessage;
use App\Notifications\OrderMessage;
use App\Notifications\ReplyOrderMessage;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;
use Notification;
use App\User;
use App\Message;
use App\Testimonial;
use App\Order;

use Riverskies\LaravelNewsletterSubscription\Jobs\SendNewsletterSubscriptionConfirmation;
use Riverskies\LaravelNewsletterSubscription\NewsletterSubscription;


class DataController extends Controller
{
    protected $p_rep;
    protected $l_rep;

    public function __construct(LangRepository $l_rep, PblRepository $p_rep, Request $request) {
        $this->p_rep = $p_rep;
        $this->l_rep = $l_rep;
    }

    public function getFooterJson()
    {
        $txt = __('buttons');
        return $footer_labels_data = $this->l_rep->getFooterLabelsData($txt);
    }

    public function contactPageMessage(Request $request) {

        $messages = $this->l_rep->messages();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
            'webmail' => 'max:0'
        ], $messages);

        $input = $request->except('_token');

        $result = [];
        $result['text'] = $input['message'];
        $result['sig'] = $input['name'];
        $result['email'] = $input['email'];
        $result['phone'] = $input['telnumber'];

        $message = new Message();
        $message->fill($result);
        $message->save();

        $user = User::find(1);

        Notification::send($user, new ContactPageMessage($result));

        return response()->json(null, 200);
    }

    public function testimonialPageMessage(Request $request) {

        $messages = $this->l_rep->messages();

        $this->validate($request, [
            'name' => 'required|string',
            'rank' => 'string',
            'email' => 'required|email',
            'message' => 'required',
            'webmail' => 'max:0'
        ], $messages);

        $input = $request->except('_token');

        $result = [];
        $result['text'] = $input['message'];
        $result['rank'] = $input['rank'];
        $result['name'] = $input['name'];
        $result['email'] = $input['email'];


        $message = new Testimonial();
        $message->fill($result);
        $message->save();

        $user = User::find(1);

        Notification::send($user, new TestimonialPageMessage($result));

        return response()->json(null, 200);
    }



    public function orderMessage(Request $request) {

        $messages = $this->l_rep->messages();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'whence' => 'required|string',
//            'where' => 'required|string',
            'message' => 'required',
            'webmail' => 'max:0'
        ], $messages);

        $input = $request->except('_token');

        $result = [];
        $result['name'] = $input['name'];
        $result['email'] = $input['email'];
        $result['whence'] = $input['whence'];
        $result['where'] = json_decode($input['where']);
        $result['text'] = $input['message'];

        $message = new Order();
        $message->fill($result);
        $message->save();

        $user = User::find(1);

        Notification::send($user, new OrderMessage($result));
        sleep(1);
        Notification::route('mail', $result['email'])
            ->notify(new ReplyOrderMessage($result));

        return response()->json(null, 200);
    }


    public function subscribe(Request $request)
    {
        $data = $request->validate(['email'=>'required|email']);
        $existingSubscription = NewsletterSubscription::withTrashed()->whereEmail($data['email'])->first();
        if ($existingSubscription) {
            if ($existingSubscription->trashed()) {
                $existingSubscription->restore();
                SendNewsletterSubscriptionConfirmation::dispatch($existingSubscription);
            }
        } else {
            $subscription = NewsletterSubscription::create(['email'=>$data['email']]);
            SendNewsletterSubscriptionConfirmation::dispatch($subscription);
        }
        return redirect()->back()
            ->with(config('newsletter_subscription.session_message_key'), trans('riverskies::newsletter_subscription.subscribe', ['email' => $data['email']]));
    }

    /**
     * @param $hash
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unsubscribe($hash)
    {
        $subscription = app('subscription-code-generator')->decode($hash);

        $subscription->delete();
        return redirect()->back()
            ->with(config('newsletter_subscription.session_message_key'), trans('riverskies::newsletter_subscription.unsubscribe', ['email' => $subscription->email]));
    }

}
