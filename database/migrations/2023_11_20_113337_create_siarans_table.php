<?php

use App\Models\Materi;
use App\Models\Tempat;
use App\Models\Ustadz;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siarans', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('waktu');
            $table->string('pekan');
            $table->foreignIdFor(Ustadz::class)->index();
            $table->foreignIdFor(Materi::class)->index();
            $table->foreignIdFor(Tempat::class)->index();
            $table->date('tanggal');
            $table->string('poster');
            $table->text('judul');
            $table->string('slug')->Unique;
            $table->boolean('is_active')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siarans');
    }
};
