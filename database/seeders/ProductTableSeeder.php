<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->create(
            [
                "product_name" => "Автомобильный аккумулятор Atlant 35HO Tico",
        "price" => 499000,
        "description" => "Польский производитель аккумуляторных батарей выпустил на рынок линейку бюджетных аккумуляторов Atlant. Они подойдут для установки на легковые автомобили со стандартным набором потребителей электроэнергии. В состав свинцового сплава, для изготовления положительных и отрицательных решеток батареи, входит кальций. Это позволило снизить расход воды вследствие испарения из электролита, а также сделало пластины более прочными и устойчивыми к образованию коррозии. Данные аккумуляторы не требуют контроля уровня электролита и обслуживания на протяжении всего рабочего ресурса. Дополнительным преимуществом является изготовление решеток с применением технологии Extended, которая сделала их более устойчивыми к механическим повреждениям. Корпус батареи выполнен из высокопрочного пластика с сохранением стандартных габаритных размеров. Он надежно защищает активные элементы от повреждений, вызванных вибрацией при движении по плохому дорожному покрытию. Аккумуляторные батареи Atlant проходят процесс зарядки прямо на заводе и готовы к работе сразу после установки на автомобиль. Для удобного перемещения батареи, в крышке установлена эргономичная ручка",
        "category_id" => 3,
        "image" => "images/products/MVT_NzWrAb6uA58FthzO3k3Q1fz4TCxu.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный аккумулятор Energy 50 Matiz best",
                "price" => 574000,
                "description" => "Необслуживаемая аккумуляторная батарея ENERGY 50 (0) производства завода «ESAN Battery».
Аккумуляторы ENERGY за последние 5 лет широко используются в странах Азии, Европы и СНГ.
Продукция экспортируется более чем 50 стран, и имеет более 200 дилерских сетей внутри страны и за рубежом.
Годовой объем выпускаемой продукции составляет 2,5 млн единиц.
В Турции аккумуляторами ENERGY на 95% укомплектован коммунальный транспорт.
Производственные мощностя завода увеличиваются поквартально – что говорит о увеличении спроса населения на данную продукцию.
Данные аккумуляторы в этом году представлены и на рынке Украины.
Аккумуляторы ENERGY не уступают мировым брендам по качеству, а по цене и долговечности превосходят их.
Срок службы данного аккумулятора составляет 3-5 лет. При правильном использовании они работают и по 7-10 лет.
6 – Цифра, указывающая число ступенчато объединенных аккумуляторов в батарее (6 либо 3) и, соответственно, характеризующая ее номинальное напряжение (при 6 аккумуляторах 12 В, при 3 аккумуляторах – 6 В)
СТ – Буквы, характеризующие предназначение аккумуляторной батареи по",
                "category_id" => 3,
                "image" => "images/products/NIBuvi5toUxkwSe0L--5xUXasDSnOa4j.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный аккумулятор Delkor 35L Tico",
                "price" => 575000,
                "description" => "Предпочтительный выбор для всех автомобилей с обычными требованиями к мощности

Сделано так, чтобы прослужить дольше

Удобная батарея без обслуживания, не требуется посыпка жидкости

Подходит для большинства транспортных средств

Батареи с маркировкой HD, специально разработанные и спроектированные для горнодобывающей промышленности и тяжелых условий эксплуатации",
                "category_id" => 3,
                "image" => "images/products/ZQ1xyBR8hv21JxI0o3U3TaA_FbimMeUp.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный аккумулятор Delkor 35R Tico",
                "price" => 575000,
                "description" => "Предпочтительный выбор для всех автомобилей с обычными требованиями к мощности

Сделано так, чтобы прослужить дольше

Удобная батарея без обслуживания, не требуется посыпка жидкости

Подходит для большинства транспортных средств

Батареи с маркировкой HD, специально разработанные и спроектированные для горнодобывающей промышленности и тяжелых условий эксплуатации",
                "category_id" => 3,
                "image" => "images/products/BGNYeAVpA78hi7MNAfTx326_hKWR_Ged.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Grenlander U08 1 шт Легковая",
                "price" => 460000,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/zUmX5mL1MBiN3Dvnji2jWZkGCN9X_dz8.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Maxpro 165/70/13 1 шт Легковая",
                "price" => 506000,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/wFsjLuKYSIFPX4J_IVRRt3_4_2f8o7FL.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Viatti Tristar 1 шт Легковая",
                "price" => 517500,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/lAf81wqJ2rzOYwe2PwLCSOa7tN-ARDOy.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Dynamo 165/70/13 1 шт Легковая",
                "price" => 32221,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/QAz_Hi1ebGNgpcijxPOXUwbuRTsvXhIl.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Radial 165/70/13 1 шт Легковая",
                "price" => 3322,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/epaD4yI18W-WqsecM1zAQT2VBT2HAILG.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Habilead 185/65/14 1 шт Легковая",
                "price" => 3212,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/z6cNUionNbLWfamepLat_Jpn4G3t0pts.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильная Шина Dynamo 185/70/13 1 шт Легковая",
                "price" => 8765,
                "description" => "",
                "category_id" => 2,
                "image" => "images/products/07X97XGigOhE9-qTOVq-etFPqlFv4MUG.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Передняя фара Y6 LED Белый",
                "price" => 1999,
                "description" => "",
                "category_id" => 4,
                "image" => "images/products/aJCcgWwlF34N3LYEH3s-3ORBUozD9ZDo.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Передняя фара LED Zimmer E8 PRO H4 Белый",
                "price" => 4999,
                "description" => "LED лампы ZIMMER E8 PRO - это последняя разработка в области автомобильного освещения. Обладая невероятной мощностью диодного элемента, лампа оснащена водяным охлаждением, которое обеспечивает надежную работу данных ламп. Данный комплект отличается компактностью и увеличенной светоотдачей и увеличенным сроком службы. Подходит для установки в легковые и грузовые автомобили, так как имеет драйвер управления, который делает данный комплект универсальным.",
                "category_id" => 4,
                "image" => "images/products/Cd5ATTgXFH319ir2kdFRLouidctoUB_w.jpg"
            ]);

        Product::query()->create(
            [
                "product_name" => "Руль Mercedes Tiptronic",
                "price" => 3999,
                "description" => "",
                "category_id" => 6,
                "image" => "images/products/rul-mercedes-tiptronic-anatomiya-1-23850-0.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный руль Mercedes Baujun",
                "price" => 3999,
                "description" => "",
                "category_id" => 6,
                "image" => "images/products/G3MIDJWts3n7CLCUmSVLVQctS8Mhc5R7DBOT9UO9D2jPsFRFjdA2c73oBSj9.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный мульти руль в cтиле Porshce new для",
                "price" => 3999,
                "description" => "",
                "category_id" => 6,
                "image" => "images/products/JvrMwT972lnsZauzU2BVz6yALiQxaQbNfIR1niN69VntZQMGrlFNfYAfE4Uf.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный мульти руль от Chevrolet в cтиле",
                "price" => 3999,
                "description" => "",
                "category_id" => 6,
                "image" => "images/products/NdVCCmCrL0qEX7JCiV9ZoXJh1neyFnShoo3EuHH20M4wXmmSRcNeaB9ewWnN.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный комплект Lenovo HR17 Full HD, GM 6D",
                "price" => 3999,
                "description" => "",
                "category_id" => 7,
                "image" => "images/products/bFdWQ6Ra4EenFcsAscqBMhPBzBDUd54FZWgGCb5N56h3l7RhYAvfMzbUHsF1.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный комплект Lenovo HR17 Full HD,",
                "price" => 3999,
                "description" => "",
                "category_id" => 7,
                "image" => "images/products/2OY2rLvTvNhBTGiSfpG45W4FmAy8hAnLQgskEuyU8FpQO90uGxkaW9w9h3HI.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный коврик Evakor с бортиками",
                "price" => 3999,
                "description" => "",
                "category_id" => 7,
                "image" => "images/products/tEUtGN5y3flthOKUpPS1KWcSSwxVo7AKIF2fl1dwK2mD4KnG4qhmtiDDXXug.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Пусковое Устройство REMAX Jump Starter RPP-511",
                "price" => 3999,
                "description" => "",
                "category_id" => 8,
                "image" => "images/products/TcqMtawfRzhJnT38K4muBUNA1e74B6pgju8nnWLqLpCg5gbfPWSKjCZ75ge3RWQt.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автономное пусковое устройство Baseus",
                "price" => 3999,
                "description" => "",
                "category_id" => 8,
                "image" => "images/products/RGsQAtQy3771FvBC8vBj6sonY9cS1kjWlGnpBlAdwjZi2simJ9tHPm2QbmzV6jSF.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Автомобильный держатель Borofone BH202 Seaside c беспроводной зарядкой",
                "price" => 3999,
                "description" => "",
                "category_id" => 8,
                "image" => "images/products/O8gSKS05tEbYi3uj2Te8ypjyJiKVM1tE1PndsTjOgPtuiZah6D3gSqxNbyiLzMPr.jpg"
            ]);
        Product::query()->create(
            [
                "product_name" => "Ароматизатор для авто Mr&Mrs Fragrance NikiVelvet",
                "price" => 55000,
                "description" => "",
                "category_id" => 8,
                "image" => "images/products/MV9JFppeSgInN2z7SU4u0zpW2milX7qBXRJANEKlcldZGeylySZrYC4hJuN6.jpg"
            ]);
    }
}
