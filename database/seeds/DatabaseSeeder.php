<?php

use Illuminate\Database\Seeder;
use App\Diaria;
use App\Adm;
use App\Valor;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
         {
             $this->call(DiariaTableSeeder::class);
         }
}
class DiariaTableSeeder extends Seeder{
    public function run(){

      Valor::create([
        'posto' => 'CB',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'CB',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'CB',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'CB',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

      Valor::create([
        'posto' => 'TM',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'TM',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'TM',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'TM',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

      Valor::create([
        'posto' => 'S1',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'S1',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'S1',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'S1',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

      Valor::create([
        'posto' => 'T1',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'T1',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'T1',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'T1',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

      Valor::create([
        'posto' => 'S2',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'S2',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'S2',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'S2',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

      Valor::create([
        'posto' => 'T2',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'T2',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'T2',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'T2',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

      Valor::create([
        'posto' => 'CV PRAÇA',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'CV PRAÇA',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'CV PRAÇA',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'CV PRAÇA',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);
      Valor::create([
        'posto' => 'Aluno CESD',
        'cidades' => 'val_br_am_rj',
        'valor' => '186.20'
      ]);
      Valor::create([
        'posto' => 'Aluno CESD',
        'cidades' => 'val_bh_fl_pa_rc_sl_sp',
        'valor' => '176.40'
      ]);
      Valor::create([
        'posto' => 'Aluno CESD',
        'cidades' => 'val_capitais',
        'valor' => '166.6'
      ]);
      Valor::create([
        'posto' => 'Aluno CESD',
        'cidades' => 'val_cidades',
        'valor' => '147.00'
      ]);

    /*  Adm::create([
        'pescodigo' => '4115570',
        'pnome' => '3S DENIS VIEIRA VANONI'
      ]);*/

    /*  Os::create([
        'pescodigo'=>'4115570',
        'pnome'=>'3S DENIS VIEIRA VANONI',
        'saram'=>'4115570',
        'cpf'=>'08800033312',
        'banco'=>'334',
        'servico'=>'Teste de envio para o banco b ',
        'om'=>'GAP-CG',
        'dono' => '4115570'
      ]);*/
    }

}
