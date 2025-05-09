<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scenario;
use App\Models\Step;
use App\Models\Option;

class ScenarioSeeder extends Seeder
{
    public function run(): void
    {
        // Scénario 1 : Entretien d'embauche
        $scenario1 = Scenario::create([
            'title' => 'Première impression',
            'user_id' => 1, // à adapter selon tes users
        ]);

        $s1_step1 = Step::create([
            'scenario_id' => $scenario1->id,
            'content' => 'Vous entrez dans la salle. Le recruteur vous tend la main. Que faites-vous ?',
            'is_start' => true,
        ]);
        $s1_step2 = Step::create([
            'scenario_id' => $scenario1->id,
            'content' => 'Le recruteur apprécie votre assurance. Il vous demande de vous présenter.',
        ]);
        $s1_step3 = Step::create([
            'scenario_id' => $scenario1->id,
            'content' => 'Le recruteur semble un peu surpris. Il commence l’entretien mais garde ses distances.',
        ]);
        $s1_step4 = Step::create([
            'scenario_id' => $scenario1->id,
            'content' => 'L’entretien reste très formel. Le recruteur semble hésitant.',
        ]);
        $s1_step5 = Step::create([
            'scenario_id' => $scenario1->id,
            'content' => 'Vous sentez une meilleure connexion. Le recruteur vous remercie chaleureusement.',
        ]);

        Option::create(['step_id' => $s1_step1->id, 'text' => 'Vous lui serrez la main fermement et souriez', 'next_step_id' => $s1_step2->id]);
        Option::create(['step_id' => $s1_step1->id, 'text' => 'Vous évitez le contact physique', 'next_step_id' => $s1_step3->id]);

        Option::create(['step_id' => $s1_step2->id, 'text' => 'Vous parlez uniquement de votre diplôme', 'next_step_id' => $s1_step4->id]);
        Option::create(['step_id' => $s1_step2->id, 'text' => 'Vous parlez aussi de vos expériences concrètes', 'next_step_id' => $s1_step5->id]);

        Option::create(['step_id' => $s1_step3->id, 'text' => 'Vous expliquez que vous n’êtes pas à l’aise avec les contacts physiques', 'next_step_id' => $s1_step5->id]);
        Option::create(['step_id' => $s1_step3->id, 'text' => 'Vous faites comme si de rien n’était', 'next_step_id' => $s1_step4->id]);

        // Scénario 2 : Conflit avec un collègue
        $scenario2 = Scenario::create([
            'title' => 'Le désaccord',
            'user_id' => 1,
        ]);

        $s2_step1 = Step::create([
            'scenario_id' => $scenario2->id,
            'content' => 'Votre collègue refuse de suivre votre proposition. Que faites-vous ?',
            'is_start' => true,
        ]);
        $s2_step2 = Step::create([
            'scenario_id' => $scenario2->id,
            'content' => 'Le ton monte. Votre manager intervient.',
        ]);
        $s2_step3 = Step::create([
            'scenario_id' => $scenario2->id,
            'content' => 'Votre collègue accepte de revoir sa position.',
        ]);
        $s2_step4 = Step::create([
            'scenario_id' => $scenario2->id,
            'content' => 'La situation reste tendue mais le manager apprécie vos efforts.',
        ]);
        $s2_step5 = Step::create([
            'scenario_id' => $scenario2->id,
            'content' => 'Le travail est livré à temps. L’ambiance s’apaise.',
        ]);

        Option::create(['step_id' => $s2_step1->id, 'text' => 'Vous haussez le ton', 'next_step_id' => $s2_step2->id]);
        Option::create(['step_id' => $s2_step1->id, 'text' => 'Vous proposez un compromis', 'next_step_id' => $s2_step3->id]);

        Option::create(['step_id' => $s2_step2->id, 'text' => 'Vous justifiez votre comportement', 'next_step_id' => $s2_step4->id]);
        Option::create(['step_id' => $s2_step2->id, 'text' => 'Vous vous excusez', 'next_step_id' => $s2_step5->id]);

        Option::create(['step_id' => $s2_step3->id, 'text' => 'Vous planifiez une réunion rapide', 'next_step_id' => $s2_step5->id]);
        Option::create(['step_id' => $s2_step3->id, 'text' => 'Vous envoyez un résumé de votre solution par mail', 'next_step_id' => $s2_step4->id]);
    }
}
