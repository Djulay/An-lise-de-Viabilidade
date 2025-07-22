<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Inscricao;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExportedDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // USERS
        User::insert([
            [
                "id" => 1,
                "name" => "júlio manico césar",
                "email" => "juliodjulay@gmail.com",
                "email_verified_at" => null,
                "created_at" => "2025-05-28 10:30:57",
                "updated_at" => "2025-05-28 10:30:57",
                "role" => "super-admin",
                "password" => bcrypt('jc945693281') // Ajuste se quiser login
            ],
            [
                "id" => 2,
                "name" => "Super Admin",
                "email" => "admin@example.com",
                "email_verified_at" => null,
                "created_at" => "2025-05-28 10:40:31",
                "updated_at" => "2025-05-28 10:40:31",
                "role" => "user",
                "password" => bcrypt('senha123')
            ],
            [
                "id" => 5,
                "name" => "Super Admin 2",
                "email" => "jc@admin.com",
                "email_verified_at" => null,
                "created_at" => "2025-05-28 10:51:48",
                "updated_at" => "2025-05-28 10:51:48",
                "role" => "super-admin",
                "password" => bcrypt('senha123')
            ],
            [
                "id" => 6,
                "name" => "testador",
                "email" => "testador@gmail.com",
                "email_verified_at" => null,
                "created_at" => "2025-06-04 16:01:39",
                "updated_at" => "2025-06-04 16:01:39",
                "role" => "user",
                "password" => bcrypt('senha123')
            ],
            [
                "id" => 7,
                "name" => "Desconhecido",
                "email" => "piedpiper@gmail.com",
                "email_verified_at" => null,
                "created_at" => "2025-06-18 10:03:30",
                "updated_at" => "2025-06-18 10:03:30",
                "role" => "user",
                "password" => bcrypt('senha123')
            ],
            [
                "id" => 8,
                "name" => "União de igrejas Evangélicas de Angola UIEA",
                "email" => "jc@gmail.com",
                "email_verified_at" => null,
                "created_at" => "2025-06-18 11:21:08",
                "updated_at" => "2025-06-18 11:21:08",
                "role" => "user",
                "password" => bcrypt('senha123')
            ],
            [
                "id" => 9,
                "name" => "União de igrejas Evangélicas de Angola UIEA",
                "email" => "uliodjulay@gmail.com",
                "email_verified_at" => null,
                "created_at" => "2025-06-18 11:37:23",
                "updated_at" => "2025-06-18 11:37:23",
                "role" => "user",
                "password" => bcrypt('senha123')
            ],
        ]);

        // CURSOS
        Curso::insert([
            [
                "id" => 3,
                "imagem" => "cursos/B0PBj6AgC7EGT2Y3fAquNdD3BUHnapcfmQOApna4.jpg",
                "nome" => "COntabilidade ss",
                "duracao" => "21 Dias",
                "custo" => "123456.00",
                "requisito" => "Licenciatura",
                "modalidade" => "Presencial",
                "local" => "Lubango",
                "ofertas" => "Nada",
                "descricao" => "zxdcfvbnjmk",
                "destaque" => 1,
                "created_at" => "2025-05-30 10:59:11",
                "updated_at" => "2025-06-19 15:10:19",
                "inscritos" => 1,
                "slug" => "destacar",
            ],
            [
                "id" => 4,
                "imagem" => "cursos/kQmdllLgH9ziQbM3ur7cjeM2FmLDs04mz3R57ibH.jpg",
                "nome" => "COntabilidade 22",
                "duracao" => "12 Dias",
                "custo" => "123456.00",
                "requisito" => "Licenciatura",
                "modalidade" => "Presencial",
                "local" => "Lubango",
                "ofertas" => "Nada",
                "descricao" => "zxdcfvbnjmk",
                "destaque" => 1,
                "created_at" => "2025-05-30 11:04:01",
                "updated_at" => "2025-05-30 14:50:49",
                "inscritos" => 0,
                "slug" => "destacar",
            ],
            // Adicione os outros cursos do array seguindo o mesmo padrão
        ]);

        // INSCRIÇÕES
        Inscricao::insert([
            [
                "id" => 1,
                "user_id" => 1,
                "curso_id" => 3,
                "status" => "aprovado",
                "created_at" => "2025-06-19 15:10:19",
                "updated_at" => "2025-06-20 10:50:41",
            ],
            [
                "id" => 2,
                "user_id" => 1,
                "curso_id" => 8,
                "status" => "aguardando",
                "created_at" => "2025-06-19 15:11:08",
                "updated_at" => "2025-06-19 15:11:08",
            ],
            [
                "id" => 3,
                "user_id" => 7,
                "curso_id" => 8,
                "status" => "aprovado",
                "created_at" => "2025-06-19 16:02:38",
                "updated_at" => "2025-06-20 10:20:05",
            ],
            [
                "id" => 4,
                "user_id" => 2,
                "curso_id" => 8,
                "status" => "aprovado",
                "created_at" => "2025-06-20 09:48:24",
                "updated_at" => "2025-06-20 10:09:10",
            ],
        ]);
    }
    }

