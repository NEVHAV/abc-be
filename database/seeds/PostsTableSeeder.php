<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->delete();

        $data = [
            [
                'id_sub' => 1,
                'id_cate' => 1,
                'id_user' => 1,
                'title' => 'Thông tin chung về công ty TNHH KTM',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 2,
                'id_cate' => 1,
                'id_user' => 1,
                'title' => 'Thông điệp tổng giám đốc',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 5,
                'id_cate' => 2,
                'id_user' => 1,
                'title' => 'Hình ảnh buổi thi tuyển',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 5,
                'id_cate' => 2,
                'id_user' => 1,
                'title' => 'Hình ảnh buổi thi tuyển',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 5,
                'id_cate' => 2,
                'id_user' => 1,
                'title' => 'Hình ảnh buổi thi tuyển',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 6,
                'id_cate' => 2,
                'id_user' => 1,
                'title' => 'Công ty Nichibu phát hành cổ phiếu',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 7,
                'id_cate' => 3,
                'id_user' => 1,
                'title' => 'Du học Nhật Bản',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_sub' => 7,
                'id_cate' => 3,
                'id_user' => 1,
                'title' => 'Du học Nhật Bản tháng 10',
                'cover' => 'https://png.pngtree.com/element_origin_min_pic/17/04/12/a8eddbc43655cda88f18512f4ca59b39.jpg',
                'content' => 'Tổng thống Putin khẳng định niềm tin rằng Nga sẽ đạt được bước đột phá khi cả đất nước hợp sức và có thể “giải quyết bất kỳ vấn đề nào”.<br>
“Chúng ta cần những bước đột phá trong tất cả các lĩnh vực của cuộc sống. Tôi tin tưởng sâu sắc rằng bước đột phá đó chỉ có thể đạt được trong một xã hội tự do, sẵn sàng tiếp nhận những điều mới mẻ cũng như hiện đại, đồng thời gạt bỏ tất cả sự bất công, trì trệ, bảo hộ và thói quan liêu”, ông nói.<br>
“Con đường phía trước không hề dễ dàng, mà đó luôn luôn là cuộc tìm kiếm khó khăn. Lịch sử sẽ không có chỗ đứng cho sự dửng dưng, thói tự mãn, sự thiếu nhất quán. Đặc biệt trong thời đại ngày nay - kỷ nguyên của những sự thay đổi diễn ra trên toàn thế giới”, ông Putin nói thêm.<br>
Theo ông Putin, “mục tiêu của chúng tôi là nước Nga cho người dân Nga, một đất nước mở ra cơ hội phát triển bản thân cho tất cả mọi người. Tôi tin tưởng sâu sắc rằng luôn có sự gắn kết trực tiếp giữa các nhiệm vụ lớn lao của đất nước với các nhu cầu thường nhật của người dân”.',
                'language' => 'vi',
                'published_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
        ];

        DB::table('posts')->insert($data);
    }
}
