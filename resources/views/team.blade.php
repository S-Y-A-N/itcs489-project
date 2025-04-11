@extends('layouts.app')

@section('content')

@php
$Parsedown = new Parsedown();

$text = $Parsedown->text('

## Our Team

---

### Leadership
**Ahmed Al-Farsi**  
*Founder & CEO*  
10+ years in e-commerce  

**Layla Al-Mansoori**  
*Operations Director*  
Supply chain specialist  

---

### Departments

**Tech**  
- Ali Hassan (Lead Developer)  
- Fatima Khalid (UX Designer)  

**Customer Care**  
- Mariam Al-Sayed (Support Manager)  
- Yusuf Ahmed (Service Specialist)  


');
@endphp

<div class="container mt-5">
{!! $text !!}
</div>

@endsection