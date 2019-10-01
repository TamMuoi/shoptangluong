<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function slug($str){

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $str = preg_replace('/ - /', ' ', $str);
        $exp = explode(' ',$str);
        $kq='';
        foreach($exp as $val){
            $kq .= $val.'-';
        }
        $kq .= time().'.html';
        return $kq;
    }

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
     /*   $roles = "Cộng tác viên, Quản trị viên, Administrator";
        $role = explode(',',$roles);
        foreach($role as $rl)
        {
            DB::table('role')->insert([
                'name' => $rl
            ]);
        }*/

        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'status' => '1',
            'password' => bcrypt('12345678'), // password :12345678
            //'level' => 3,
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'birth' => '1997-5-12',
            'avatar' => 'male.png',
            'gender' => '0',
            'email' => 'user@gmail.com',
            'status' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password :12345678

        ]);

        $cate_news = "Tin Khuyến Mãi,Tin Thời Trang,Sự Kiện";
        $cates = explode(',',$cate_news);
        foreach($cates as $cate)
        {
            DB::table('cate_news')->insert([
                'name' => $cate,
                'slug' => $this->slug($cate)
            ]);
        }
        DB::table('collections')->insert([
            [
            'name' => 'Đông-Xuân',
            'slug' => $this->slug('Đông-Xuân'),
            'image' => 'dong-xuan.jpg'
            ],
            [
            'name' => 'Hè-Thu',
            'slug' => $this->slug('Hè-Thu'),
            'image' => 'he-thu.jpg'
            ]
        ]);

        $sizes ="X,XS,XL,XXL,XXXL,M,L";
        $size = explode(',', $sizes);
        foreach ($size as $value){
            DB::table('size')->insert([
               'name' => $value
            ]);
        }

        $colors ="red,green,blue,yellow,orange,violet,black,white,pink,brown,grey";
        $color = explode(',', $colors);
         foreach ($color as $value){
             DB::table('color')->insert([
                 'name' => $value
             ]);
         }

         $cates ="Áo,Đầm,Chân Váy,Quần,Phụ Kiện,Công Sở";
         $cate = explode(',', $cates);
              foreach($cate as $value)
              {
                  DB::table('cate_products')->insert([
                      'name' => $value,
                      'slug' => $this->slug($value)
                  ]);
              }
        DB::table('sliders')->insert([
            [
                'image' => '0FFa_image_banner-3.jpg'
            ],
            [
                'image' => 't4BX_image_banner-2.jpg'
            ],
            [
                'image' => '8sEr_image_banner-3.jpg'
            ]
        ]);
        DB::table('payment_methods')->insert([
           [ 'name' => 'Thanh toán khi nhận hàng']
        ]);

        DB::table('introduce')->insert([
            'summary' => 'Cửa hàng thời trang',
            'content' => '<p><a href="https://www.facebook.com/hashtag/lalaland?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARDLloVr0Gst6HpSA8Kd8_VPPKlIXz_qgVbi-3JC5mGoLAuPMESJW40el-U9A7FGMUlyIBf1DpGMfbNXjUOm_C60PX7fZSbAjgsKzhm21eBcTd2S1opNPm8yfV260J6wJcr86BFxG-8JXehnmOxHCan87s-PKkUbjPv1u1wprOtAMQjp2HwoUuUcB_LTpXF47-wTT3vyIvQrTFSLPo2kzODXqt2btChK_7gX2pcaM-reyngA2X0U7lEwvtY_Uu-pgr5xwawxT3euaRJFWhmO5EJrJbLfdSr9TpDJxQxe9WnMyEp43YNfrSuL7Le--O6h5OxArTBIp1xZg5_sxjX3M2o&amp;__tn__=%2ANK-R">#Lalaland</a> l&agrave; thương hiệu thời trang nữ của Việt Nam, chuy&ecirc;n thiết kế ĐẦM v&agrave; &Aacute;O DẠ cao cấp. <a href="https://www.facebook.com/hashtag/lalaland?source=note&amp;epa=HASHTAG" target="_blank">#Lalaland</a> được thai ngh&eacute;n v&agrave; ra đời bởi những người trẻ c&oacute; chung niềm đam m&ecirc; thời trang v&agrave; kh&aacute;t khao đưa tới kh&aacute;ch h&agrave;ng những sản phẩm thủ c&ocirc;ng từ ch&iacute;nh đ&ocirc;i b&agrave;n tay v&agrave; tr&iacute; s&aacute;ng tạo của họ. 📷&lt;3📷&lt;3 📷<img alt="" src="https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1/18/2764.png" style="height:18px; width:18px" />&lt;3<br />'
                         .'C&aacute;c sản phẩm của <a href="https://www.facebook.com/hashtag/lalaland?source=note&amp;epa=HASHTAG" target="_blank">#Lalaland</a> lu&ocirc;n đề cao sự tinh tế v&agrave; quyến rũ trong từng đường n&eacute;t nhưng vẫn đảm bảo trẻ trung, sang trọng, l&atilde;ng mạn ph&ugrave; hợp cho c&aacute;c chị em khi đi l&agrave;m cũng như dự c&aacute;c sự kiện quan trọng.<br />'
                         .'Với sứ mệnh mang tới vẻ đẹp c&ugrave;ng sự tự tin, quyến rũ cho người phụ nữ Việt Nam, <a href="https://www.facebook.com/hashtag/lalaland?source=note&amp;epa=HASHTAG" target="_blank">#Lalaland</a> cam kết sẽ thường xuy&ecirc;n đưa ra thị trường c&aacute;c mẫu thiết kế mới, hiện đại nhất để lu&ocirc;n đem đến sự l&agrave;m h&agrave;i l&ograve;ng kh&aacute;ch h&agrave;ng. 📷<img alt="" src="https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1/18/2764.png" style="height:18px; width:18px" />&lt;3 📷<img alt="" src="https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1/18/2764.png" style="height:18px; width:18px" />&lt;3 📷<img alt="" src="https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1/18/2764.png" style="height:18px; width:18px" />&lt;3</p>'
    #                    .'<p>KH&Ocirc;NG CHỈ LÀ THỜI TRANG</p>'
                        .'<p>LALALAND THI&Ecirc;́T K&Ecirc;́ GI&Acirc;C MƠ CỦA BẠN</p>'
                        .'<p>Album Summer Sale: <a href="https://www.facebook.com/pg/thoitrangthietkeLalaland/photos/?tab=album&amp;album_id=976923762512194">https://www.facebook.com/pg/thoitrangthietkeLalaland/photos/?tab=album&amp;album_id=976923762512194</a></p>'
                        .'<p>BST Hè: <a href="https://www.facebook.com/pg/thoitrangthietkeLalaland/photos/?tab=album&amp;album_id=973221242882446">https://www.facebook.com/pg/thoitrangthietkeLalaland/photos/?tab=album&amp;album_id=973221242882446</a></p>'
                        .'<p>BST Áo dài: <a href="https://www.facebook.com/pg/thoitrangthietkeLalaland/photos/?tab=album&amp;album_id=939486196255951">https://www.facebook.com/pg/thoitrangthietkeLalaland/photos/?tab=album&amp;album_id=939486196255951</a></p>'
                        .'<p>📍Địa chỉ : 40 Đo&agrave;n Trần Nghiệp - Hai B&agrave; Trưng - H&agrave; Nội<br />'
                        .'☎️ Hotline : 0969.995.586e<br />'
                        .'📌 Fanpage FB: LalaLand<br />'
                        .'📌 IG : thoitranglalaland</p>',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/hVPpMS2-s7s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'email' => 'lalaland40dtn@gmail.com',
            'phone' => '0375787600',
            'facebook' => 'https://www.facebook.com/thoitrangthietkeLalaland/',
            'instagram' => 'https://www.instagram.com/thoitranglalaland/',
        ]);
    }
}
