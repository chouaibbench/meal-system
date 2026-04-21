<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Code;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

#[Signature('app:generate-daily-codes')]
#[Description('Command description')]
class GenerateDailyCodes extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $users = User::where('meal_credit', '>', 0)->get();

        foreach ($users as $user) {

            // check ila deja kayn code today
            $exists = Code::where('user_id', $user->id)
                ->whereDate('date', $today)
                ->exists();

            if ($exists) continue;

            // generate unique code
            do {
                $codeValue = strtoupper(Str::random(6));
            } while (Code::where('code', $codeValue)->exists());

            Code::create([
                'user_id' => $user->id,
                'code' => $codeValue,
                'date' => $today
            ]);
        }
 
        $this->info('Daily codes generated successfully!');
    }
}
