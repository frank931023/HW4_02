<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'name' => '運動',
                'description' => '歡迎討論各類運動項目，從籃球、棒球到健身與馬拉松，分享你的運動經驗與最新賽事心得。',
            ],
            [
                'name' => '美食',
                'description' => '各地美食探索、食譜分享與餐廳評比，歡迎美食愛好者來這裡交流吃貨心得！',
            ],
            [
                'name' => '國內大小事',
                'description' => '政治、交通、天氣、社會議題……生活中發生的大小事，歡迎在這裡討論與分享觀點。',
            ],
            [
                'name' => '電玩遊戲',
                'description' => '無論是主機、電腦還是手遊，最新遊戲、經典回憶、實況分享都歡迎來聊。',
            ],
            [
                'name' => '感情',
                'description' => '戀愛煩惱、告白經驗、分手療傷、曖昧分析……有關感情的所有困惑都可以傾訴。',
            ]
        ];

        foreach ($pages as $pageData) {
            Page::create($pageData);
        }
    }
}
