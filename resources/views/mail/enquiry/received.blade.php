@component('mail::message')
# Dear Admin,

You have received an enquiry. The   details are listed below:

<table>
<tr>
<th align="left">Name:</th>
<td>{{ $enquiry->name }}</td>
</tr>
<tr>
<th align="left">Subject:</th>
<td>{{ $enquiry->subject }}</td>
</tr>
<tr>
<th align="left">Email:</th>
<td>{{ $enquiry->email }}</td>
</tr>
<tr>
<th align="left">Message:</th>
<td>{{ $enquiry->message }}</td>
</tr>
</table>

@endcomponent
