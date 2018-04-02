<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');                 
            $table->string('site_style');
            $table->string('site_name');
            $table->string('site_email');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('site_description');
            $table->text('site_keywords');
            $table->text('site_header_code');
            $table->text('site_footer_code');
            $table->string('site_copyright');
            $table->text('footer_widget1');
            $table->text('footer_widget2');
            $table->text('footer_widget3');
            $table->text('addthis_share_code');
            $table->text('disqus_comment_code');
            $table->string('social_facebook');
            $table->string('social_twitter');
            $table->string('social_linkedin');
            $table->string('social_gplus');
            $table->string('about_us_title');            
            $table->text('about_us_description');
            $table->string('careers_with_us_title');
            $table->text('careers_with_us_description');
            $table->string('terms_conditions_title');
            $table->text('terms_conditions_description');
            $table->string('privacy_policy_title');
            $table->text('privacy_policy_description');
            $table->string('currency_sign'); 
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
