<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_description',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'linkedin',
        'meta_title',
        'meta_description',
        'meta_keywords',
        // Theme Colors
        'primary_color',
        'secondary_color',
        'accent_color',
        'header_bg_color',
        'footer_bg_color',
        'body_bg_color',
        'header_text_color',
        'footer_text_color',
        'body_text_color',
        'button_primary_color',
        'button_primary_hover',
        'button_secondary_color',
        'button_secondary_hover',
        'link_color',
        'link_hover_color',
        'card_bg_color',
        'card_border_color',
        'card_shadow_color',
        'admin_sidebar_bg',
        'admin_sidebar_text',
        'admin_sidebar_hover',
        'admin_header_bg',
        'admin_header_text',
        // Transparency settings
        'navbar_transparency',
        'header_transparency',
        'footer_transparency',
        'enable_blur_effect',
        // Card button colors
        'card_button_bg',
        'card_button_text',
        'card_button_border',
        'card_button_hover_bg',
        'card_button_hover_text',
        'card_button_hover_border',
        // Detailed color settings
        'section_bg_color',
        'section_text_color',
        'button_text_color',
        'button_outline_color',
        'link_text_color',
        'badge_bg_color',
        'badge_text_color',
        // Footer color settings
        'footer_link_color',
        'footer_link_hover_color',
        'footer_border_color',
        'footer_social_bg_color',
        'footer_social_hover_color',
    ];
}
