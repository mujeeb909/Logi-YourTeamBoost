<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class CoachDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
        protected $coachId;
    
        public function __construct($coachId)
        {
            $this->coachId = $coachId;
        }
    
        public function headings(): array
        {
            return [
                'Coach Name',
                'Organization',
                'Player Associated',
                'Donor Email',
                'Donor Paid Amount',
                'Payment Information',
                'Total Campaign Money Raised',
                'Percent Money School Raised',
                'Percent Money YourTeamBoost Takes'
            ];
        }
    
        public function collection()
        {   
            // Retrieve coach data
            $coachData = User::where('id', $this->coachId)
                ->where('coach_id', 0)
                ->where('type', '!=', 3)
                ->first(); 
    
            // Retrieve player count
            $playerCount = User::where('coach_id', $this->coachId)->count();
            $players = User::where('coach_id', $this->coachId)->get();
            $totalEmailCount=0;
            foreach ($players as $player) {
                
                $emailsArray = explode(',', $player->emails);
            
                
                $totalEmailCount += count($emailsArray);
            }
            
            $coachName = $coachData->name; 
            $sportsProgram = $coachData->sports; 
    
            $donation = Transaction::where('coach_id', $this->coachId)->sum('amount');

            if($donation == null){
                $donation = '$' . 0;
            }else{
                $donation = '$' . $donation;
            }
            
            return collect([
                [
                    $coachName,
                    $sportsProgram,
                    $playerCount,
                    $totalEmailCount,
                    $donation
                ]
            ]);
        }
    }