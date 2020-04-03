@component('mail::message')
<h2>New Comment Notification</h2>


A reader <strong>({{$data['commenter']}})</strong> just added a comment on one of your episode: <strong>{{$data['episode']}}</strong>


<a href="http://www.penhub.com.ng/{{$data['slug']}}" class="btn btn-primary">Check Comment</a>

Thanks,<br>
PENhub Naija
@endcomponent
