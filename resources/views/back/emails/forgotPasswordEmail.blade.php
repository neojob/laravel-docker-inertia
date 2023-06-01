
# Introduction

Please click the following link to reset your password


<a href="{{ url('/resetPasswordBackPart') . '?' . http_build_query(['email' => $user->email,'resetCode'=>$code]) }}" >Click here</a>
Thanks,<br>
{{ config('app.name') }}

