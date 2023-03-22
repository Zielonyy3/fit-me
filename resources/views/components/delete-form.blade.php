@props(['url'])
{!! Form::open([
    'method' => 'DELETE',
    'url' => $url,
    'style' => 'display:inline'
]) !!}
{!! Form::submit(__t('common.delete'), ['class' => 'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}
