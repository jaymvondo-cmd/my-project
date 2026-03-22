<?php 
require_once(__DIR__ . "/config/app.php");
require_once(__DIR__ . "/includes/header.php"); 
?>

<div class="hero" style="text-align: center; padding: 60px 40px; background: rgba(0,0,0,0.5); border-radius: 20px; margin-top: 40px; backdrop-filter: blur(12px); border: 1px solid var(--glass-border); box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <h1 style="font-size: 48px; font-weight: 800; color: var(--primary); margin-bottom: 20px;">About GameVault</h1>
    
    <div style="max-width: 800px; margin: 0 auto; text-align: left; color: var(--text-main); line-height: 1.8; font-size: 18px;">
        <p style="margin-bottom: 20px;">
            Welcome to <strong>GameVault</strong>, the ultimate e-commerce destination where premium gaming quality meets modern aesthetics. 
            We provide high-performance gear for competitive gamers who demand excellence in both performance and design.
        </p>
        
        <p style="margin-bottom: 20px;">
            Our hardware is carefully curated from top manufacturers and professional e-sports suppliers. We believe that your gear should be an extension of your skill. That's why we've designed our platform to reflect the high-energy, high-tech world of professional gaming.
        </p>
        
        <h3 style="color: white; font-size: 24px; margin-top: 40px; margin-bottom: 15px;">Our Mission</h3>
        <p style="margin-bottom: 20px;">
            To equip every gamer with the tools they need to win, through an interface that inspires confidence and performance.
        </p>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 50px; text-align: center;">
            <div style="background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; border: 1px solid var(--glass-border);">
                <div style="font-size: 32px; font-weight: bold; color: var(--primary); margin-bottom: 10px;">50k+</div>
                <div style="font-size: 14px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Pro Gamers Served</div>
            </div>
            <div style="background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; border: 1px solid var(--glass-border);">
                <div style="font-size: 32px; font-weight: bold; color: var(--primary); margin-bottom: 10px;">200+</div>
                <div style="font-size: 14px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Tier-1 Products</div>
            </div>
            <div style="background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; border: 1px solid var(--glass-border);">
                <div style="font-size: 32px; font-weight: bold; color: var(--primary); margin-bottom: 10px;">24/7</div>
                <div style="font-size: 14px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Tech Support</div>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/includes/footer.php"); ?>
