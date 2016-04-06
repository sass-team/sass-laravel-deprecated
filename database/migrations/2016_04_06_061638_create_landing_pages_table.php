<?php

use App\LandingPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(false);
            $table->string('home_title');
            $table->string('home_description');
            $table->string('home_access_button');
            $table->timestamps();
        });

        LandingPage::create([
            'active'             => true,
            'home_title'         => 'SASS App',
            'home_description'   => 'CMS for <a href="http://www.acg.edu/academics/center-for-academic-enrichment-cae/student-academic-support-services-sass">Student Academic Support Services</a>',
            'home_access_button' => 'Access',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('landing_pages');
    }
}
