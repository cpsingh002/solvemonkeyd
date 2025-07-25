@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SolveMonkey')
<img src="https://solvemonkey.com/assets/img/logo/solve-logo.png" class="logo" alt="SolveMonkey Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
