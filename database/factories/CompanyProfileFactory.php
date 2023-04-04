<?php

namespace Database\Factories;

use App\Models\CompanyProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company() . $this->faker->randomElement([
                'アドバンステクノロジーズ',
                'グローバルビジョン',
                'イノベーションパートナーズ',
                'スマートソリューションズ',
                'ファーストクラスコーポレーション',
                'ダイナミックビルダーズ',
                'ネクストジェネレーションエンタープライズ',
                'エコパワーデザイン',
                'リーディングエッジコンサルタント',
                'ハイパフォーマンスマーケティング',
                'スカイロケットビジネス',
                'アクセラレーションデベロップメント',
                'フューチャープランニング',
                'クリエイティブイノベーターズ',
                'プレミアムデジタルサービス',
                'オプティマムファイナンス',
                'スマートエンジニアリング',
                'ソリッドファンデーション',
                'サステナブルプロジェクト',
                'プログレッシブインダストリー',
                'Velocity Ventures',
                'Stellar Innovations',
                'Apex Enterprises',
                'Vanguard Ventures',
                'Phoenix Industries',
                '東京システム開発',
                '関西電機',
                '太陽コンサルティング',
                '光デザイン',
                '空海物流',
                '新生銀行',
                '星空インターネット',
                '月光製菓',
                '大地保険',
                '海風エンジニアリング',
                '龍神工業',
                '花咲貿易',
                '橋本総合病院',
                '雲の上不動産',
                '水晶ITソリューションズ',
                '鳳凰マーケティング',
                '万里建設',
                '峰電気',
                '虹色デジタル',
                '遥か遠方観光'
            ]),
            'company_url' => $this->faker->url(),
            'contact_email' => $this->faker->unique()->companyEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'industry' => $this->faker->randomElement(['IT','製造','マーケティング','営業','金融','	建設','電気工事']),
            'address' => $this->faker->streetAddress(),
        ];
    }
}
