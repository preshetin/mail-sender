@extends('mail-sender::emails.layouts.master')

@section('body')
    <tr>
        <td style="padding:45px 52px; font-size:14px; color:#404040; line-height:20px; " colspan="2">
            {!! $body !!}
        </td>
    </tr>
@stop
