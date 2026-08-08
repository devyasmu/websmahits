<?php

namespace App\Helpers;

use App\Models\SiteSetting;

class ThemeHelper
{
    /**
     * Generate dynamic CSS based on site settings
     */
    public static function generateDynamicCSS()
    {
        try {
            $settings = SiteSetting::first();
        } catch (\Throwable $e) {
            return '';
        }
        
        if (!$settings) {
            return '';
        }

        $css = "
        :root {
            --primary-color: {$settings->primary_color};
            --secondary-color: {$settings->secondary_color};
            --accent-color: {$settings->accent_color};
            --header-bg-color: {$settings->header_bg_color};
            --footer-bg-color: {$settings->footer_bg_color};
            --body-bg-color: {$settings->body_bg_color};
            --header-text-color: {$settings->header_text_color};
            --footer-text-color: {$settings->footer_text_color};
            --body-text-color: {$settings->body_text_color};
            
            /* Footer specific colors */
            --footer-link-color: " . ($settings->footer_link_color ?? '#ffffff') . ";
            --footer-link-hover-color: " . ($settings->footer_link_hover_color ?? '#007bff') . ";
            --footer-border-color: " . ($settings->footer_border_color ?? '#333333') . ";
            --footer-social-bg-color: " . ($settings->footer_social_bg_color ?? '#333333') . ";
            --footer-social-hover-color: " . ($settings->footer_social_hover_color ?? '#007bff') . ";
            --button-primary-color: {$settings->button_primary_color};
            --button-primary-hover: {$settings->button_primary_hover};
            --button-secondary-color: {$settings->button_secondary_color};
            --button-secondary-hover: {$settings->button_secondary_hover};
            --link-color: {$settings->link_color};
            --link-hover-color: {$settings->link_hover_color};
            --card-bg-color: {$settings->card_bg_color};
            --card-border-color: {$settings->card_border_color};
            --card-shadow-color: {$settings->card_shadow_color};
            
            /* Admin variables for consistency */
            --admin-sidebar-bg: {$settings->admin_sidebar_bg};
            --admin-sidebar-text: {$settings->admin_sidebar_text};
            --admin-sidebar-hover: {$settings->admin_sidebar_hover};
            --admin-header-bg: {$settings->admin_header_bg};
            --admin-header-text: {$settings->admin_header_text};
            
            /* Transparency settings */
            --navbar-transparency: " . ($settings->navbar_transparency ?? 100) . "%;
            --header-transparency: " . ($settings->header_transparency ?? 100) . "%;
            --footer-transparency: " . ($settings->footer_transparency ?? 100) . "%;
            --blur-effect: " . ($settings->enable_blur_effect ? 'blur(10px)' : 'none') . ";
            
            /* Card button colors */
            --card-button-bg: " . ($settings->card_button_bg ?? '#007bff') . ";
            --card-button-text: " . ($settings->card_button_text ?? '#ffffff') . ";
            --card-button-border: " . ($settings->card_button_border ?? '#007bff') . ";
            --card-button-hover-bg: " . ($settings->card_button_hover_bg ?? '#0056b3') . ";
            --card-button-hover-text: " . ($settings->card_button_hover_text ?? '#ffffff') . ";
            --card-button-hover-border: " . ($settings->card_button_hover_border ?? '#0056b3') . ";
            
            /* Detailed color settings */
            --section-bg-color: " . ($settings->section_bg_color ?? '#f8f9fa') . ";
            --section-text-color: " . ($settings->section_text_color ?? '#333333') . ";
            --button-text-color: " . ($settings->button_text_color ?? '#007bff') . ";
            --button-outline-color: " . ($settings->button_outline_color ?? '#007bff') . ";
            --link-text-color: " . ($settings->link_text_color ?? '#007bff') . ";
            --badge-bg-color: " . ($settings->badge_bg_color ?? '#007bff') . ";
            --badge-text-color: " . ($settings->badge_text_color ?? '#ffffff') . ";
        }

        /* Public Website Styles */
        body {
            background-color: var(--body-bg-color) !important;
            color: var(--body-text-color) !important;
        }

        .navbar {
            background-color: var(--header-bg-color) !important;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: var(--header-text-color) !important;
        }

        .navbar .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--button-primary-color) !important;
            border-color: var(--button-primary-color) !important;
        }

        .btn-primary:hover {
            background-color: var(--button-primary-hover) !important;
            border-color: var(--button-primary-hover) !important;
        }

        .btn-secondary {
            background-color: var(--button-secondary-color) !important;
            border-color: var(--button-secondary-color) !important;
        }

        .btn-secondary:hover {
            background-color: var(--button-secondary-hover) !important;
            border-color: var(--button-secondary-hover) !important;
        }

        a {
            color: var(--link-color) !important;
        }

        a:hover {
            color: var(--link-hover-color) !important;
        }
        
        /* Card button styles */
        .card .btn, .card .btn-outline-primary, .card .btn-outline-secondary {
            background-color: var(--card-button-bg) !important;
            color: var(--card-button-text) !important;
            border-color: var(--card-button-border) !important;
            transition: all 0.3s ease;
        }
        
        .card .btn:hover, .card .btn-outline-primary:hover, .card .btn-outline-secondary:hover {
            background-color: var(--card-button-hover-bg) !important;
            color: var(--card-button-hover-text) !important;
            border-color: var(--card-button-hover-border) !important;
        }
        
        /* Specific card button classes */
        .card .btn-primary {
            background-color: var(--card-button-bg) !important;
            color: var(--card-button-text) !important;
            border-color: var(--card-button-border) !important;
        }
        
        .card .btn-primary:hover {
            background-color: var(--card-button-hover-bg) !important;
            color: var(--card-button-hover-text) !important;
            border-color: var(--card-button-hover-border) !important;
        }

        .card {
            background-color: var(--card-bg-color) !important;
            border-color: var(--card-border-color) !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .border-primary {
            border-color: var(--primary-color) !important;
        }

        footer {
            background-color: var(--footer-bg-color) !important;
            color: var(--footer-text-color) !important;
        }

        footer a {
            color: var(--footer-link-color) !important;
        }

        footer a:hover {
            color: var(--footer-link-hover-color) !important;
        }

        footer .border-top {
            border-color: var(--footer-border-color) !important;
        }

        footer .social-link {
            background-color: var(--footer-social-bg-color) !important;
            color: var(--footer-text-color) !important;
        }

        footer .social-link:hover {
            background-color: var(--footer-social-hover-color) !important;
            color: var(--footer-text-color) !important;
        }

        /* Admin Panel Styles */
        .admin-sidebar {
            background-color: var(--admin-sidebar-bg) !important;
        }

        .admin-sidebar .nav-link {
            color: var(--admin-sidebar-text) !important;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background-color: var(--admin-sidebar-hover) !important;
            color: var(--admin-sidebar-text) !important;
        }

        .admin-header {
            background-color: var(--admin-header-bg) !important;
            color: var(--admin-header-text) !important;
        }

        .admin-header .navbar-brand,
        .admin-header .nav-link {
            color: var(--admin-header-text) !important;
        }
        ";

        return $css;
    }

    /**
     * Generate admin CSS
     */
    public static function generateAdminCSS()
    {
        try {
            $settings = SiteSetting::first();
        } catch (\Throwable $e) {
            return '';
        }
        
        if (!$settings) {
            return '';
        }

        $css = "
        :root {
            --admin-sidebar-bg: {$settings->admin_sidebar_bg};
            --admin-sidebar-text: {$settings->admin_sidebar_text};
            --admin-sidebar-hover: {$settings->admin_sidebar_hover};
            --admin-header-bg: {$settings->admin_header_bg};
            --admin-header-text: {$settings->admin_header_text};
        }

        .admin-sidebar {
            background-color: var(--admin-sidebar-bg) !important;
        }

        .admin-sidebar .nav-link {
            color: var(--admin-sidebar-text) !important;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background-color: var(--admin-sidebar-hover) !important;
            color: var(--admin-sidebar-text) !important;
        }

        .admin-header {
            background-color: var(--admin-header-bg) !important;
            color: var(--admin-header-text) !important;
        }

        .admin-header .navbar-brand,
        .admin-header .nav-link {
            color: var(--admin-header-text) !important;
        }
        ";

        return $css;
    }
}
