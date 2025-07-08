<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

// Model
use App\Models\User;
use App\Models\Candidate;
use App\Models\MstRules;

class DeleteUserCron extends Command
{
    protected $signature = 'DeleteUserCron';
    protected $description = 'Delete User Candidate who not confirm more than rule value';

    public function handle()
    {
        $logMessage = '';
        $expConfirm = MstRules::where('rule_name', 'Expired Confirmation Email')->first()->rule_value;
        $expConfirm = Carbon::now()->subMinutes($expConfirm);
        $listCandidate = User::where('is_active', 0)
            ->where('role', 'Candidate')
            ->where('created_at', '<=', $expConfirm)
            ->get();

        if ($listCandidate->count() > 0) {
            DB::beginTransaction();
            try {
                $email = [];
                foreach ($listCandidate as $candidate) {
                    $email[] = $candidate->email;
                    User::where('id', $candidate->id)->delete();
                    Candidate::where('id_user', $candidate->id)->delete();
                }
                DB::commit();
                $logMessage = 'Success Delete User Candidate: ' . implode(', ', $email) . ' at ' . Carbon::now();
            } catch (\Exception $e) {
                DB::rollBack();
                $logMessage = 'Fail Running Command at ' . Carbon::now();
            }
        }

        // Only log if there is output (i.e., deletions or errors)
        if ($logMessage) {
            $logDir = storage_path('logs/LogDeleteUserCron');
            if (!file_exists($logDir)) {
                mkdir($logDir, 0777, true);
            }
            $filename = $logDir . '/LogDeleteUserCron_' . Carbon::now()->format('YmdHis') . '.txt';
            file_put_contents($filename, $logMessage);
        }
    }

}
