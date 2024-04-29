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
                'Players Associated',
                'Donor Email',
                'Total Donor Paid Amount',
                'Total Campaign Money Raised',
                'Percent Money School Raised'
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
            $OrganProgram = $coachData->team_name; 
    
            $donation = Transaction::where('coach_id', $this->coachId)->sum('amount');
            $donorEmails = Transaction::where('coach_id', $this->coachId)->count('id');
            $organizationDonation = Transaction::where('organization', $coachData->team_name)->sum('amount');

            

            $organizationPlayers = User::where('team_name',$coachData->team_name)
                                        ->where('coach_id',$this->coachId)
                                        ->get();

            $totalOrganizationPlayersEmails = [];

            foreach ($organizationPlayers as $organizationPlayer) {
                
                $emailsArray = explode(',', $organizationPlayer->emails);
                $trimmedEmailsArray = array_map('trim', $emailsArray);
                $totalOrganizationPlayersEmails = array_merge($totalOrganizationPlayersEmails, $trimmedEmailsArray);
            }

            $countMatchedEmails = Transaction::whereIn('email',  $totalOrganizationPlayersEmails)->count();
            $countAllOrganizationPlayersEmails = count($totalOrganizationPlayersEmails);
                
            $perOrganizationDonation = ($countMatchedEmails / $countAllOrganizationPlayersEmails) * 100;
            
            
            return collect([
                [
                    $coachName,
                    $OrganProgram,
                    ($playerCount)?$playerCount:'0',
                    ($donorEmails)?$donorEmails:'0',
                    ($donation)?'$'.$donation:'$0',
                    ($organizationDonation)?'$'.$organizationDonation:'$0',
                    ($perOrganizationDonation)?$perOrganizationDonation.'%':'0%'
                ]
            ]);
        }
    }

