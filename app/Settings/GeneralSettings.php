<?php

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
     public string $site_name;
     public string $site_description;
     public string $site_logo;
     public bool $site_active;

     public static function group(): string
     {
          return 'general';
     }
}
