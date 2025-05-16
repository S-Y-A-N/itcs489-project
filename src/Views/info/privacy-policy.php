<?php
$Parsedown = new Parsedown();

$text = $Parsedown->text('
    

# Privacy Policy

**Last Updated:** 10 April 2025 

At Cheapy, we value your privacy. This policy explains how we collect, use, and protect your personal data when you use our website.

---

## 1. Data We Collect
We may collect:
- **Identifiers:** Name, email, phone number, shipping/billing address  
- **Payment Data:** Card type, last 4 digits (processed via PCI-compliant gateways)  
- **Technical Data:** IP address, browser type, device information (via cookies)  
- **Usage Data:** Pages visited, cart activity, purchase history  

## 2. How We Use Your Data
Your information helps us:
- Process orders and deliver products  
- Communicate order updates and offers (with consent)  
- Improve website functionality and user experience  
- Comply with legal obligations (e.g., Bahrain VAT reporting)  

## 3. Data Sharing
We only share data with:
- **Payment processors** (e.g., BenefitPay, Stripe) to complete transactions  
- **Shipping providers** (e.g., DHL, FedEx) for delivery  
- **Legal authorities** if required by Bahraini law  

We **never sell** your data to third parties.

## 4. Cookies & Tracking
- We use essential cookies for site functionality (e.g., cart retention).  
- Optional analytics cookies (Google Analytics) help improve our services.  
- Manage preferences via your browser settings or our **Cookie Banner**.

## 5. Data Security
- All data is encrypted via **SSL/TLS**.  
- Payment details are tokenized and never stored on our servers.  
- Regular security audits to protect against breaches.

## 6. Your Rights
Under Bahraini law and GDPR, you may:
- **Access** or **delete** your personal data  
- **Correct** inaccurate information  
- **Opt out** of marketing emails (via unsubscribe link)  
- **Withdraw consent** for data processing  

To exercise these rights, contact [support@cheapy.com](mailto:support@cheapy.com).

## 7. Data Retention
We retain your data only as long as necessary:  
- **Order records:** 5 years (for tax compliance)  
- **Account data:** Until deletion request  
- **Marketing consent:** 2 years (unless renewed)  

## 8. Policy Updates
We may update this policy periodically. Changes will be posted here with a revised "Last Updated" date.

---

**Contact Us:**  
For privacy-related inquiries:  
📧 Email: [support@cheapy.com](mailto:support@cheapy.com)  
📞 Phone: [+973 1000 1000](#) (Sun – Thu, 9 AM – 5 PM)  

*By using our site, you acknowledge this Privacy Policy.*  


');
?>

<div class="container mt-5">
<?= $text ?>
</div>

