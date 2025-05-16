<?php
$Parsedown = new Parsedown();

$text = $Parsedown->text('
    

## Our Team

---

### Leadership
**Ahmed Al-Farsi**  
*Founder & CEO*  
20+ years in e-commerce  

**Layla Al-Mansoori**  
*Operations Director*  
Supply chain specialist  

---

### Departments

**Tech**  
- Ali Hassan (Lead Developer)  
- Fatima Khalid (UX Designer)  

**Customer Support**  
- Mariam Al-Sayed (Support Manager)  
- Yusuf Ahmed (Service Specialist)  


');
?>

<div class="container mt-5">
  <?= $text ?>
</div>