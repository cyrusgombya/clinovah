@props([
    'url',
    'color' => 'primary',
    'align' => 'center',
])

<table class="action" align="{{ $align }}" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin:30px auto;">
<tr>
<td align="{{ $align }}">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $url }}"
   class="button button-{{ $color }}"
   target="_blank"
   rel="noopener"
   style="
      display:inline-block;
      background:#0e523f;
      color:#ffffff;
      text-decoration:none;
      padding:14px 24px;
      border-radius:14px;
      font-weight:800;
      font-family:Arial, Helvetica, sans-serif;
   ">
  {!! $slot !!}
</a>
</td>
</tr>
</table>
</td>
</tr>
</table>