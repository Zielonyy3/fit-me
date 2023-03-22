@props(['user', 'small' => false])
@if(Auth::user()->getKey() !== $user)
    {!! Form::open([
                   'method' => 'POST',
                   'url' => route('chats.store', $user),
                   'style' => 'display:inline'
               ]) !!}
    {!! Form::submit(__t('common.send_message'), ['class' => 'my-2 btn btn-secondary'.($small? ' btn-sm': '')]) !!}
    {!! Form::close() !!}
@endif
