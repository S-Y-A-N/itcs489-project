<?php
$Parsedown = new Parsedown();

$text = $Parsedown->text('
    

# Frequently Asked Questions

<br>

### Order Processing

###### What is the processing time for orders?
Orders are typically processed within 1-2 business days (Sunday through Thursday). Processing times may be longer during peak seasons or promotional periods.

###### Can I modify or cancel my order after placement?
Order modifications or cancellations must be requested within 2 hours of placement by contacting our customer service team at support@yourwebsite.com. We cannot guarantee changes can be made after this window as orders move quickly into processing.

<br>

### Shipping & Delivery

###### What shipping options are available?
We offer the following shipping methods within Bahrain:
- Standard Shipping (3-5 business days) - Free for orders over BHD 20
- Express Shipping (1-2 business days) - BHD 3.5
- Same-Day Delivery (Manama area only) - BHD 5 (Order by 12 PM)

###### Do you ship internationally?
Yes, we offer international shipping to GCC countries with delivery times of 5-10 business days. Additional customs fees may apply and are the customer\'s responsibility.

<br>

### Returns & Refunds

###### What is your return policy?
We accept returns within 14 days of delivery for unused items in original condition with all tags attached. Please review our full [Return Policy](#) for complete details and exclusions.

###### How long do refunds take to process?
Refunds are processed within 5 business days after we receive your return. The time for the refund to reflect in your account depends on your financial institution but typically takes 3-5 additional business days.

<br>

### Payments

###### What payment methods do you accept?
We accept all major payment options:
- Credit/Debit Cards (Visa, Mastercard, American Express)
- BenefitPay
- Apple Pay
- Bank Transfer (for corporate accounts only)

###### Is my payment information secure?
All transactions are processed through certified PCI-DSS compliant payment gateways with 256-bit SSL encryption.

');
?>

<div class="container mt-5">
<?= $text ?>
</div>

