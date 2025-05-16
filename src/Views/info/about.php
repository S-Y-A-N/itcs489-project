<?php
$Parsedown = new Parsedown();

$text = $Parsedown->text('
    
# About Us

**Your Trusted Shopping Partner in Bahrain**  

At Cheapy, we’re redefining online shopping in Bahrain and the Gulf with curated products, seamless service, and a passion for authenticity.

---

## Our Story  
Founded in 2025 in Manama, we started as a small boutique serving local customers. Today, we’ve grown into Bahrain’s premier e-commerce destination, delivering thousands of orders annually across the GCC.  

**Why we exist:**  
- To bridge global brands with Bahraini shoppers  
- To support local artisans and businesses  
- To make premium products accessible at fair prices  

---

## What Sets Us Apart

#### Gulf-Centric Curation
We handpick products tailored to regional tastes and needs—from modest fashion to date-inspired gourmet gifts.  

#### Bahrain-Built Logistics
- Free same-day delivery in Manama  
- Climate-controlled warehousing  
- GCC-wide shipping with customs support  

#### Community First
- 5% of profits fund local initiatives
- Partnered with Bharaini charities since 2025

---
## Our Values

##### Integrity
We operate with honesty and transparency in all business practices.

##### Excellence
We deliver premium quality products and exceptional customer service.

##### Innovation
We leverage cutting-edge technology to enhance your shopping experience.

##### Community
We actively support local businesses and sustainable initiatives.

##### User-Centric
Your satisfaction drives every decision we make.

');
?>

<div class="container mt-5">
<?= $text ?>
</div>

