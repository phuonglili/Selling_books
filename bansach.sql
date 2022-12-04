-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2021 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `trangthai` int(1) NOT NULL,
  `tongtien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `username`, `hoten`, `email`, `phone`, `diachi`, `note`, `order_date`, `trangthai`, `tongtien`) VALUES
(1, 's2bluemoon01', 'Hải', 'hai123@hotmail.com', '0869215201', 'hà nội', 'Ông Thaler cũng đặt ra thuật ngữ \"cú hích\" aaaaaaaaaaaaaaaa(nudge), ý chỉ các tác động cần thiết để giúp con người vượt qua định kiến, loại bỏ thói quen làm theo người khác để tránh phạm lầm ngớ ngẩn khi phải đưa ra quyết định.\r\n\r\na bước vđược ban tặng.', '2021-11-05 17:26:59', 1, 198000),
(2, 's2blueeyes01', 'tú', 'tubi123@gmail.com', '0833146619', 'hoài đức', 'tú bí test', '2021-11-05 17:28:02', 2, 288000),
(3, 'hai321', 'Nguyễn Ngọc Hoàn', 'hoan123@hotmail.com', '0833146619', 'VN', 'test', '2021-11-06 17:03:00', 0, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `masach` int(16) NOT NULL,
  `giatien` int(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `masach`, `giatien`, `soluong`, `tongtien`) VALUES
(1, 1, 25, 50000, 2, 100000),
(2, 1, 43, 49000, 2, 98000),
(3, 2, 38, 99000, 1, 99000),
(4, 2, 26, 99000, 1, 99000),
(5, 3, 58, 100000, 1, 100000),
(6, 3, 72, 50000, 2, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` int(16) NOT NULL,
  `tensach` varchar(255) NOT NULL,
  `tacgia` varchar(255) NOT NULL,
  `theloai` varchar(255) NOT NULL,
  `image` mediumtext NOT NULL,
  `mota` text NOT NULL,
  `giatien` int(20) NOT NULL,
  `ngaycapnhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `tacgia`, `theloai`, `image`, `mota`, `giatien`, `ngaycapnhat`) VALUES
(22, 'Kinh tế học vĩ mô', 'Nguyễn Như ý', 'Kinh Tế', '../../../assets/images/kinh-te-hoc-vi-mo.jpg', 'Kinh tế học vĩ mô hay là kinh tế tầm lớn (Macroeconomic) là một phân ngành của kinh tế học chuyên nghiên cứu về đặc điểm, cấu trúc và hành vi của cả một nền kinh tế nói chung. Kinh tế học vĩ mô và kinh tế học vi mô là hai lĩnh vực chung của kinh tế học.\r\nTrong khi kinh tế học vi mô chủ yếu nghiên cứu về hành vi của các cá thể đơn lẻ, như công ty và cá nhân người tiêu dùng, kinh tế học vĩ mô lại nghiên cứu các chỉ tiêu cộng hưởng như GDP, tỉ lệ thất nghiệp, và các chỉ số giá cả để hiểu cách hoạt động của cả nền kinh tế.\r\nCuốn sách này có những nội dung chính sau: Đại cương về kinh tế học, khái quát về kinh tế học vi mô, tổng sản phẩm và thu nhập quốc dân, tổng cầu và chính sách tài khoá, tiền tệ và chính sách tiền tệ, tổng cung và chu kỳ kinh doanh, thất nghiệp và lạm phát, kinh tế vi mô của nền kinh tế mở.', 239000, '2021-11-06 22:59:36'),
(23, 'Cú hích', 'Richard H Thaler', 'Kinh Tế', '../../../assets/images/sach-kinh-te-5.png', 'Ông Thaler cũng đặt ra thuật ngữ \"cú hích\" (nudge), ý chỉ các tác động cần thiết để giúp con người vượt qua định kiến, loại bỏ thói quen làm theo người khác để tránh phạm lầm ngớ ngẩn khi phải đưa ra quyết định.\r\n\r\n', 99000, '2021-11-05 22:55:40'),
(25, 'Chiến tranh tiền tệ', 'Song Hong Bing', 'Kinh Tế', '../../../assets/images/chien-tranh-tien-te.jpg', '“Chiến tranh tiền tệ” giúp chúng ta hiểu nhiều điều, rằng Bill Gates chưa phải là người giàu nhất hành tinh, rằng tỉ lệ tử vong của các tổng thống Mỹ lại cao hơn tỉ lệ tử trận của binh lính Mỹ ngoài chiến trường, hay vì sao phố Wall lại mạo hiểm đổ hết vốn liếng của mình cho việc “đầu tư” vào Hitler.\r\n\r\n', 169000, '2021-11-05 22:55:52'),
(26, 'Cuộc đua triệu đô la', 'Kirk Hallowell ', 'Kinh Tế', '../../../assets/images/d22b6b150369af83804a27f927ea9adb.jpg', 'Cuốn sách Cuộc đua triệu đôla mượn hình ảnh cuộc đua vượt rào Olympic như phép ẩn dụ cho cuộc cạnh tranh khốc liệt để giành lấy những vị trí quản lý hàng đầu trong các tổ chức đang tuyển dụng. Muốn chiến thắng, mỗi vận động viên phải có thể lực và tư duy tuyệt vời. Họ không chỉ cần “chạy nhanh” mà còn phải biết phối hợp các bước chạy, nhảy qua rào cản vào thời điểm chính xác và uyển chuyển nhất.\r\n\r\n', 169000, '2021-11-05 22:56:00'),
(27, 'Đắc nhân tâm', 'Dale Carnegie', 'Tâm Lý', '../../../assets/images/dac-nhan-tam_600x865.png\r\n', 'Đây là quyển sách duy nhất về thể loại self-help liên tục đứng đầu danh mục sách bán chạy nhất (best-selling Books) do báo The New York Times bình chọn suốt 10 năm liền. Riêng bản tiếng Anh của sách đã bán được hơn 15 triệu bản trên thế giới. Tác phẩm có sức lan toả vô cùng rộng lớn – dù bạn đi đến bất cứ nơi đâu, bất kỳ quốc gia nào cũng đều có thể nhìn thấy. Tác phẩm được đánh giá là quyển sách đầu tiên và hay nhất, có ảnh hưởng làm thay đổi cuộc đời của hàng triệu người trên thế giới.', 139000, '2021-11-02 00:00:00'),
(28, 'Nghệ thuật sống', 'Epictetus', 'Tâm Lý', '../../../assets/images/nghe-thuat-song-epictetus.jpg\r\n', 'Tác phẩm nghệ thuật sống nêu lên những quan niệm về cuộc sống và cách sống: sống là gì, lẽ sống của con người, nhận biết chân giá trị của sự vật, hành động để giải thoát…\r\n\r\nTác giả không tập trung khai thác, phân tích tâm lý con người như những sách nghệ thuật sống, rèn luyện nhân cách phổ biến hiện nay. Ông cũng không lên gân, dạy dỗ phải làm điều này điều nọ để có được hạnh phúc trong cuộc sống. Tác giả hướng người đọc đến việc nhận thức được giá trị sự vật như nó vốn có, hiểu được bản ngã của mình để hành động phù hợp với hoàn cảnh. Để trở nên một con người hoàn tòan, theo tác giả, con người cần phải làm hai điều: cải tạo cá nhân và cải tạo xã hội. Đây cũng là chủ đề xuyên suốt trong các chương của cuốn sách.', 199000, '2021-11-02 00:00:00'),
(29, 'Một lít nước mắt', 'Kito Aya', 'Tâm Lý', '../../../assets/images/Mot-lit-nuoc-mat-2277-1535167004.jpg', 'Tuổi 15, của chúng ta:\r\nTuổi của niềm hạnh phúc tràn đầy khi cánh cửa trung học rộng mở chào đón\r\nTuổi của những lần vui đùa, chạy nhảy quanh bạn bè\r\nTuổi của những khao khát thực hiện ước mơ ấp ủ cho tương lai phía trước\r\n\r\n', 69000, '2021-11-05 22:56:12'),
(30, 'Điểm bùng phát', 'Malcolm Gladwell', 'Tâm Lý', '../../../assets/images/review-sach-diem-bung-phat-nghien-cuu-tam-ly-xa-hoi.jpg', 'Điểm Bùng Phát là một khoảnh khắc rất kỳ ảo, khi một ý tưởng, một xu thế, hay một hành vi xã hội vượt qua ngưỡng nhất định – bùng phát và lan ra như ngọn lửa hoang dã.\r\n\r\nLà một chuyến thám hiểm đầy trí tuệ được viết bằng giọng văn sôi nổi, nhiệt huyết, rất dễ làm nảy sinh các ý tưởng mới, Điểm Bùng Phát đã vạch rõ lộ trình cho sự thay đổi với một thông điệp đầy hứa hẹn: mỗi cá nhân sáng tạo, biết sử dụng chiếc đòn bẩy đúng lúc là người có thể nâng bổng cả thế giới.\r\n\r\n', 169000, '2021-11-05 22:56:24'),
(31, 'Tâm lý bầy đàn', 'Mark Earls', 'Tâm Lý', '../../../assets/images/tam-ly-bay-dan-270x405.jpg\r\n', 'Cuốn sách này dành cho những ai đang tìm cách thay đổi hành vi của nhiều người – như khách hàng, nhân viên hay những công dân riêng của họ. Đây không phải là cuốn sách hướng dẫn kỹ năng tự hoàn thiện – dù tôi đã học được rất nhiều về bản thân mình trong quá trình nghiên cứu và viết nó. Nó cũng không có ý định thách thức các chuyên gia – những người đang giúp những người khác thay đổi cuộc sống.\r\n\r\nCuốn sách này cũng không viết về các cá nhân và hành vi cá nhân; nó viết về hành vi đám đông.', 169000, '2021-11-02 00:00:00'),
(32, 'Sổ đỏ', 'Vũ Trọng Phụng', 'Văn Học Việt Nam ', '../../../assets/images/sach-so-do-185x300.jpg\r\n', 'Đọc “Số Đỏ” – phải hiểu tình hình đất nước thời đó mới thấm được mặt trái xã hội Vũ Trọng Phụng truyền tải. Đối tượng nhà văn phê phán là tầng lớp tiểu tư sản Hà Thành đầu thế kỉ 20, nhưng cái hay là ông không đi vào đối tượng chính mà mượn ngay Xuân – cái thằng “lươn lẹo” lại có thói “trưởng giả học làm sang” – để dựa vào nó mà đào sâu vào phê phán sự rởm đời của giới thượng lưu thành thị, từ đó chuyển hướng nói về “tấn trò đời” của những diễn viên đại tài – họ diễn trong cuộc sống, diễn với những người thân, và diễn cả với chính bản thân mình.', 99000, '2021-11-02 00:00:00'),
(33, 'Tắt đèn', 'Ngô Tất Tố', 'Văn Học Việt Nam', '../../../assets/images/sach-tat-den-189x300.jpg\r\n', '\"Tắt đèn là một cuốn xã hội tiểu thuyết tả cảnh đau khổ của dân quê, của một người đàn bà nhà quê An Nam suốt đời sống trong sự nghèo đói và sự ức hiếp của bọn cường hào và người có thế lực mà lúc nào cũng vẫn hết lòng vì chồng, vì con\".', 129000, '2021-11-02 00:00:00'),
(34, 'Vợ nhặt ', 'Kim Lân', 'Văn Học Việt Nam', '../../../assets/images/sach-vo-nhat.jpg\r\n', 'Tác phẩm \"Vợ Nhặt\" của tác giả Kim Lân (1921-2007). Ông là một trong những cây bút viết truyện ngắn xuất sắc nhất của văn học Việt Nam hiện đại.\r\n\r\nVới “Vợ Nhặt”, tác giả viết về cái đói, khi đói người ta thường khổ cực và chỉ muốn chết. Nhưng không, khi đói người ta không nghĩ đến con đường chết mà chỉ nghĩ đến con đường sống. Dù ở trong tình huống bi thảm đến đâu, dù kề cận cái chết vẫn khát khao được sống, được hạnh phúc, vẫn hướng về ánh sáng, vẫn tin vào sự sống và hy vọng ở tương lai, vẫn muốn sống, sống cho ra người... Chúng ta có thể thấy được điều này ở các nhân vật trong tập truyện ngắn này.', 169000, '2021-11-02 00:00:00'),
(35, 'Tuổi Thơ Dữ Dội', 'Phùng Quán', 'Văn Học Việt Nam', '../../../assets/images/sach-tuoi-tho-du-doi-192x300.jpg\r\n', 'Bao thăng trầm cảm xúc khi đọc tác phẩm này: Lòng cười vui khi đọc những phút giây nghịch ngợm, vui đùa của cha ông ngày đó; , bồi hồi, xúc động không cầm được nước mắt khi đọc đến những khó khăn, khổ cực mà quân, dân của Nước ta ngày xưa phải chịu đựng; Tự hào, mạnh mẽ có thêm động lực phụng sự tổ quốc khi nhận thấy tinh thần chiến đấu anh dũng của cha ông. Xuyên suốt tác phẩm nhiều lúc không hiểu nổi tại sao ngày xưa Cha ông ta có thể chịu được cực khổ như vậy để sống và chiến đấu bảo vệ Quốc gia.', 400000, '2021-11-02 00:00:00'),
(36, 'Chí Phèo', 'Nam Cao', 'Văn Học Việt Nam', '../../../assets/images/sach-chi-pheo-206x300.jpg', 'Chí Phèo là một truyện ngắn nổi tiếng của nhà văn Nam Cao viết vào tháng 2 năm 1941. Chí Phèo là một tác phẩm xuất sắc, thể hiện nghệ thuật viết truyện độc đáo của Nam Cao, đồng thời là một tấn bi kịch của một người nông dân nghèo bị tha hóa trong xã hội. Truyện đã được đưa vào sách giáo khoa Ngữ văn 1\r\n\r\n', 169000, '2021-11-05 22:56:36'),
(37, 'Mùa Thu Của Cây Dương', 'Kazumi Yumoto', 'Văn Học Nước Ngoài', '../../../assets/images/cover-review-sach-mua-thu-cua-cay-duong-150x150.jpeg', 'Mùa hè năm lên sáu tuổi, gia đình mẹ con Chiaki lâm vào cảnh khốn cùng. Mẹ cô bé quá đỗi tiều tụy không thể chăm lo nổi cho Chiaki nhạy cảm và đang khủng hoảng bởi sự đi bất ngờ của bố. Nhưng, từ sau khi dọn đến khu căn hộ cho thuê có tên Cây Dương, Chiaki dần tìm lại hạnh phúc tuổi thơ tưởng chừng đã mất, nhờ có bà cụ chủ nhà - khó tính, nấu ăn dở, ưa sạch sẽ, hay dọa trẻ con… nhưng âm thầm tốt bụng. Thời gian thấm thoắt trôi, hai mươi năm sau Chiaki nhận được tin bà qua đời. Trên hành trình quay về dự đám tang bà, dòng ký ức ngọt ngào của những tháng ngày sống tại Cây Dương lặng lẽ ùa về. Nơi đây, cô đã tìm ra một sự thật, về chính bản thân cô, về mẹ cô, và nhất là về bà cụ, người dù đã mất đi nhưng sẽ mãi luôn còn ở đó. ', 259000, '2021-11-05 22:56:50'),
(38, 'Tội ác Và Hình Phạt', 'Fyodor Dostoevsky', 'Văn Học Nước Ngoài', '../../../assets/images/cover-review-sach-toi-ac-va-hinh-phat-150x150.jpg\r\n', 'Tội Ác Và Hình Phạt là cuốn tiểu thuyết hoàn chỉnh và hay nhất trong các tác phẩm của cây bút bậc thầy nước Nga Fyodor Dostoevsky (1821 -1881).', 119000, '2021-11-02 00:00:00'),
(39, 'Đàn Hương Hình', '\r\nMạc Ngôn', 'Van Học Nước Ngoài', '../../../assets/images/cover-reviewsach.net-dan-huong-hinnh-150x150.jpeg\r\n', 'Đàn hương hình (檀香刑, nghĩa là \"hình phạt bằng cọc gỗ đàn hương\") là một tiểu thuyết nổi tiếng của nhà văn Mạc Ngôn. Ông viết tác phẩm này vào mùa thu năm 1996 và hoàn thành năm 2001.', 169000, '2021-11-02 00:00:00'),
(40, 'Trắng', 'Han Kang', 'Văn Học Nước Ngoài', '../../../assets/images/cover-tieu-thuyet-trang-150x150.jpg\r\n', 'Tiểu thuyết “Trắng” của nữ nhà văn Hàn Quốc Han Kang là tác phẩm phá vỡ mọi ranh giới của thể loại: vừa là tiểu thuyết giàu tự thuật, vừa là tiểu luận, đôi chỗ là thơ, lại có chỗ chỉ đơn giản là một vài dòng ghi chép rất vụn vặt. Cuốn sách mỏng chỉ chưa đầy trăm trang là ‘không gian triển lãm” của một loạt những thứ mang màu sắc “trắng”, là câu chuyện của một người đang cố gắng nói lời tiễn biệt với một phần quan trọng trong mình.', 179000, '2021-11-02 00:00:00'),
(41, 'Cuốn Theo Chiều Gió', ' Margaret Mitchell', 'Văn Học Nước Ngoài', '../../../assets/images/cuon-theo-chieu-gio_2.jpg', 'Cuối cùng thì tôi cũng quyết định điểm đến tác phẩm kinh điển này. Tôi đã đọc  từ những năm cuối cấp hai và từ đó đến nay không biết bao nhiêu lần đã đọc đi đọc lại. Một cái tên lừng lẫy đến thế, những thành tích mà tác phẩm này đạt được suốt mấy chục năm qua đã là minh chứng cho sự xuất sắc của nó.\r\n\r\n', 159000, '2021-11-05 22:57:02'),
(42, 'Alice Ở Xứ Sở Diệu Kỳ ', 'Lewis Carroll', 'Thiếu Nhi', '../../../assets/images/Alice-o-xu-so-dieu-ky_600x855.jpg', 'Alice Ở Xứ Sở Diệu Kỳ Và Alice Ở Thế Giới Trong Gương là một tuyệt tác văn học kinh điển bất hủ dành cho thiếu nhi, tràn đầy trí tưởng tượng thần kỳ bất tận, trải ra một thế giới huyền ảo như những giấc mộng đầy màu sắc với chú Thỏ Trắng mặc áo gi lê mang đồng hồ quả quýt, chú mèo Cheshire biết cười, anh em Tweedledum và Tweedledee đánh nhau vì cái trống bỏi, Humpty Dumpty béo tròn như quả trứng luôn ngồi trên đầu tường, và Kỵ sĩ Trắng không biết cưỡi ngựa... Chắc hẳn mỗi một người chúng ta, đều đã từng ước ao có được những giấc mơ diệu kỳ như cô bé Alice...\r\n\r\n', 49000, '2021-11-05 22:57:14'),
(43, 'Charlie Và Nhà Máy Sôcôla', 'Roald Dahl', 'Thiếu Nhi', '../../../assets/images/Charlie-va-nha-may-so-co-la_600x857.jpg\r\n', 'Charlie và nhà máy sôcôla là tiểu thuyết văn học thiếu nhi xuất bản năm 1964 của nhà văn Roald Dahl người Anh. Truyện kể về cuộc phiêu lưu của cậu bé Charlie Bucket trong nhà máy sô-cô-la của ông chủ nhà máy lập dị Willy Wonka. ', 59000, '2021-11-02 00:00:00'),
(44, 'Không Gia Đình', 'Hector Malot', 'Thiếu Nhi', '../../../assets/images/khong_gia_dinh_600x867.png', 'Không Gia Đình là tiểu thuyết nổi tiếng nhất trong sự nghiệp văn chương của Hector Malot. Hơn một trăm năm nay, tác phẩm giành giải thưởng của Viện Hàn Lâm Văn học Pháp này đã trở thành người bạn thân thiết của thiếu nhi và tất cả những người yêu mến trẻ khắp thế giới.\r\n\r\n', 79000, '2021-11-05 22:57:26'),
(45, 'Tuổi Thơ Dữ Dội', 'Phùng Quán', 'Thiếu Nhi', '../../../assets/images/sach-tuoi-tho-du-doi-192x300.jpg\r\n', 'Bao thăng trầm cảm xúc khi đọc tác phẩm này: Lòng cười vui khi đọc những phút giây nghịch ngợm, vui đùa của cha ông ngày đó; , bồi hồi, xúc động không cầm được nước mắt khi đọc đến những khó khăn, khổ cực mà quân, dân của Nước ta ngày xưa phải chịu đựng; Tự hào, mạnh mẽ có thêm động lực phụng sự tổ quốc khi nhận thấy tinh thần chiến đấu anh dũng của cha ông. Xuyên suốt tác phẩm nhiều lúc không hiểu nổi tại sao ngày xưa Cha ông ta có thể chịu được cực khổ như vậy để sống và chiến đấu bảo vệ Quốc gia', 169000, '2021-11-02 00:00:00'),
(46, 'Những Tấm Lòng Cao Cả', 'Cuore', 'Thiếu Nhi', '../../../assets/images/Nhung-tam-long-cao-ca_600x927.jpg\r\n', 'Những tấm lòng cao cả (Cuore) ra đời từ những năm 80 của thế kỷ 19 đã làm cho tên tuổi nhà văn Edmondo De Amicis (1846 - 1908) trở nên nổi tiếng khắp thế giới.\r\n\r\nCho đến nay tác phẩm bất hủ này vẫn vang vọng và để lại dấu ấn đậm nét trong lòng người đọc đặc biệt là các em thiếu nhi ở các thời đại khác nhau.\r\n\r\nĐó là một câu chuyện giản dị, với những con người bình thường nhất nhưng nhân cách của họ, mối quan hệ của họ, cùng những tấm lòng cao cả, thánh thiện của họ mãi là những bài học đạo đức sâu sắc và đáng quý.\r\n\r\nMột cậu bé ngưòi Ý, Enrico, hằng ngày ghi lại những việc lớn nhỏ diễn ra trong đời học sinh của cậu, những cảm tưởng và suy nghĩ của cậu thành một cuốn nhật ký.', 169000, '2021-11-02 00:00:00'),
(47, 'Căn Bệnh Giáo Dục', 'Ryu Uchida', 'Giáo Dục - Gia Đình', '../../../assets/images/can-benh-giao-duc.jpg', 'Mội dung cuốn sách chỉ ra một số nguy cơ tồn tại trong giáo dục Nhật Bản như sau:\r\n\r\n-Vấn đề thành tích trong thể dục đội hình khổng lồ hóa, câu lạc bộ Judo và các câu lạc bộ ngoại khóa của Nhật Bản đang được thổi phồng ở các trường học, rất nhiều tai nạn, thậm chí tai nạn chết người lặp lại cùng nguyên nhân nhưng vẫn không được quan tâm đúng mức mà nó bị làm mờ đi vì khoác dưới vỏ bọc “khổ luyện thành tài”. Việc trẻ bị “trừng phạt thân thể” hay bạo hành vẫn được coi là “một phần của giáo dục” bởi xuất phát điểm của việc trừng phạt nghiêm khắc là để trẻ có kỉ luật và tiến bộ hơn. Vô hình trung điều đó càng khiến bạo lực được dung túng.\r\n\r\n', 239000, '2021-11-05 21:56:04'),
(51, 'Nếp Gấp Thời Gian', 'Madeleine L’Engle', 'Giáo Dục - Gia Đình', '../../../assets/images/nep-gap-thoi-gian_600x971.gif', ' \"Những đêm bão là ta khoái lắm đấy,\" người lạ kỳ cục bảo ba mẹ con. \"Chỉ có điều ta bị luồng gió cuốn phăng đi, rồi bị thổi trệch cả đường... Ta sẽ ngồi xuống một lát, đi ủng vào và sau đó lên đường. Nói đến chuyện đường xá, nhân đây, có tồn tại cái vật gọi là khối lập phương bốn chiều, cưng ạ.\"\r\n', 129000, '2021-11-05 21:52:10'),
(52, 'Những Điều Mẹ Chưa Kể', 'Woo Yul Jung', 'Giáo Dục - Gia Đình', '../../../assets/images/nhung-dieu-me-chua-ke.jpg', ' Khó khăn trong việc nuôi dạy con cái chính là khó khăn của mối quan hệ giữa con người với nhau. Nhưng những người mẹ thì khác, họ phải dung hòa rất nhiều mối quan hệ đó là mối quan hệ với con cái, mối quan hệ trong hôn nhân, hoặc mối quan hệ với bố mẹ đôi bên, đồng nghiệp….', 139000, '2021-11-05 21:55:47'),
(53, 'Nghệ Thuật Giảng  Dạy', 'Woo Yul Jung', 'Giáo Dục - Gia Đình', '../../../assets/images/nghe-thuat-giang-day.jpg', 'Sự hiện diện của một nền giáo dục như vậy phụ thuộc vào nhiều yếu tố, nhưng yếu tố quyết định nhất là quan niệm về vai trò của người thầy. Quan niệm không đúng về vai trò trung tâm của người thầy đối với chất lượng giáo dục rất dễ đưa nền giáo dục đến chỗ sai lệch. Đặt người thầy lên vị trí quyền uy tuyệt đối về chân lí khoa học là một sai lầm, nhưng sai lầm sẽ lớn hơn nếu hạ thấp hoặc thậm chí phủ nhận vai trò then chốt của người thầy đối với chất lượng giáo dục. ', 99000, '2021-11-05 22:55:16'),
(54, 'Mỗi Ngày Sống Xanh', 'Sakédemy', 'Giáo Dục - Gia Đình', '../../../assets/images/moi-ngay-song-xanh-thay-doi-lon-den-tu-hanh-dong-nho.jpg', ' Chúng ta đọc được vô vàn bài viết về tác hại của nhựa, về việc sử dụng lãng phí nước, lãng phí điện, về đại dương ô nhiễm, không khí độc hại… Theo đó, phong trào “sống xanh” cũng ngày càng được nhiều người hưởng ứng, lựa chọn làm lối sống cho mình. Thế nhưng, rất nhiều người không biết phải bắt đầu từ đâu.', 735000, '2021-11-05 22:07:49'),
(55, 'Ký Ức Đường Trường Sơn', 'Lưu Trọng Lân', 'Lịch Sử', '../../../assets/images/ky-uc-duong-truong-son-1.jpg', ' Đối với Lưu Trọng Lân, đường Trường Sơn là một mảng thiêng liêng trong cuộc đời chiến đấu sôi nổi của mình. Mỗi câu chuyện về Trường Sơn đã được anh ghi chép lại bằng lời văn chân thực và cả một nỗi niềm xúc động sâu xa. Anh nói: \"Nhiều lúc cổ tôi như nghẹn lại, mắt tôi nhòa đi trong khi viết, nhất là lúc nhớ lại hình ảnh những đồng đội đã ngã xuống năm xưa giữa núi rừng Trường Sơn\".', 99000, '2021-11-05 22:09:38'),
(56, 'Lam Sơn Thực Lực', 'Nguyễn Trãi', 'Lịch Sử', '../../../assets/images/lam-son-thuc-luc-1.jpg', ' Lam Sơn Thực Lục (藍山實錄) là tác phẩm văn xuôi bằng chữ Hán được biên soạn theo lệnh của vua Lê Thái Tổ được viết từ ngày mồng 6, tháng 12, năm Thuận Thiên thứ 4 (1431), tức là 3 năm sau năm quân Minh rút về nước (1428). Lúc đó vua Lê Thái Tổ đã hoàn thành việc xây dựng chế độ hành chính và đánh dẹp các tù trưởng không phục tùng nhà Lê. Lam Sơn Thực Lục kể lại quá trình khởi nghĩa đánh bại quân Minh của nghĩa quân Lam Sơn do Lê Thái Tổ chỉ huy.', 243000, '2021-11-05 22:10:50'),
(57, 'Lịch Sử Việt Nam Quyển 2', 'Trần Thị Vinh', 'Lịch Sử', '../../../assets/images/lich-su-viet-nam-quyen-2-tu-le-loi-khoi-nghia-den-nguyen-suy-vong-1.jpg', ' Giới thiệu tới các bạn yêu môn lịch sử bộ sách Lịch sử Việt Nam trọn bộ 15 tập - tóm tắt các sự kiện theo dòng lịch sử của Việt Nam qua các thời kỳ: Thời kỳ cổ - trung đại (từ thời tiền sử đến năm 1858, khi thực dân Pháp nổ sung xâm lược Việt Nam); Thời kỳ cận đại (thời kỳ thực dân Pháp xâm lược, biến Việt Nam thành thuộc địa đến Cách mạng tháng Tám năm 1945 thành công) và Thời kỳ hiện đại (từ khi nước Việt Nam Dân chủ Cộng hòa ra đời cho đến nay)', 234000, '2021-11-05 22:11:57'),
(58, 'Chuyện Thời Bao Cấp', 'Nhiều Tác Giả', 'Lịch Sử', '../../../assets/images/chuyen-thoi-bao-cap-tap-1-1.jpg', ' Thời bao cấp, một nhà thơ đã viết đại ý: khi con sinh ra, bố phải chạy xin mười mấy con dấu vuông, tròn. Đầu tiên là xin giấy chứng sinh ở trạm xá xã, rồi lên Uỷ ban nhân dân làm giấy khai sinh. Tiếp đó, xin thêm mấy cái giấy giới thiệu của cơ quan người mẹ, rồi mang từng ấy thứ giấy lên công an huyện và các phòng Thương nghiệp, phòng Lương thực… để nhập hộ khẩu và xin cấp tiêu chuẩn lương thực, tiêu chuẩn mua vải làm tã lót cho trẻ sơ sinh và các tiêu chuẩn khác của sản phụ, kể cả vải màn, cùng các loại tem phiếu thực phẩm cho trẻ.', 324000, '2021-11-05 22:13:01'),
(59, 'Cố Đô Huế Xưa Và Nay', 'Hội Khoa Học Lịch Sử Thừa Thiên Huế', 'Lịch Sử', '../../../assets/images/co-do-hue-xua-va-nay-1.jpg', ' Song song với quá trình lịch sử trải dài qua nhiều thế kỷ là vai trò của những con người bằng xương bằng thịt đã được lịch sử ghi dấu như cha con Đặng Tất – Đặng Dung, Nguyễn Huệ, Ngô Văn Sở, tướng nhà Tây Sơn Võ Văn Dũng, Nguyễn Văn Tường, Thân Văn Nhiếp, Thân Trọng Huề, Thân Trọng Phước, vua Duy Tân, Phan Bội Châu,… mà chúng ta không thể bỏ qua.', 221000, '2021-11-05 22:14:23'),
(60, 'Kinh Tế Học', 'Paul A Samuelson   Willian D Nordhalls', 'Kinh Tế', '../../../assets/images/image_195509_1_43845.jpg', ' Kinh tế học là một khoa học động - luôn thay đổi để phản ánh những xu hướng biến chuyển của những vấn đề kinh tếm của môi trường và nền kinh tế thế giới, cũng như của xã hội nói chung. Khi kinh tế học và thế giới rộng lớn hơn xung quanh ta phát triển thì cuốn sách này cũng vậy. Mỗi một chương của nó đều bám sát những thay đổi của những phân tích kinh tế và chính sách kinh tế.', 125000, '2021-11-05 22:16:49'),
(61, 'Tinh Hoa Kinh Tế Học', 'Paul Krugman & Robin Wells', 'Kinh Tế', '../../../assets/images/tinhhoakinhtehocjpg.jpg', '  Cuốn sách này là “giáo trình” không thể thiếu trong tủ sách của mọi nhà, đặc biệt là những ai quan tâm, trực tiếp giảng dạy và học tập trong lĩnh vực Kinh tế học, một lĩnh vực không kém phần thú vị và gần gũi.', 143000, '2021-11-05 22:19:43'),
(62, 'Chiến Lược Đại Dương Xanh', 'Renee Mauborgne   W Chan Kim', 'Kinh Tế', '../../../assets/images/photo1602853808623-1602853808857932721221.jpg', ' Chiến Lược Đại Dương Xanh (Tái Bản 2017) là cuốn sách viết ra nhằm thay đổi tư duy chiến lược cho các giám đốc, nhà lãnh đạo doanh nghiệp với một chiến lược đơn giản: hãy bơi trong luồng nước rộng. Các công ty đang phải vật lộn cạnh tranh trong đại dương đỏ hẳn sẽ làm tốt hơn nếu học hỏi và làm theo \'Chiến lược đại dương xanh\'.', 215000, '2021-11-05 22:21:42'),
(63, 'Tâm Lý Học Kỳ Thú', '	Konstantin Platonov', 'Tâm Lý', '../../../assets/images/image_187317.jpg', ' Hiểu biết về tâm lý của mọi người nói chung, và nhất là tâm lý của con cái nói riêng để giáo dục cho đúng cách là vô cùng quan trọng. Cuốn sách này nhằm phục vụ nhu cầu đó. Cuốn sách đặc biệt ở chỗ nó biến những kiến thức về tâm lý học phức tạp thành những câu chuyện đơn giản và lý thú.', 155000, '2021-11-05 22:23:19'),
(64, 'Tâm Lý Lứa Tuổi Và Giáo Dục', 'Mạc Văn Trang', 'Tâm Lý', '../../../assets/images/825454a3728550050f4e498048fa9fb8.jpg.webp', ' Giáo dục thực chất là tạo ra điều kiện phù hợp để trẻ tự hoạt động, giao tiếp, trải nghiệm, lĩnh hội và phát triển. Nếu giáo dục tác động đúng lúc hay \"đón trước\" sự phát triển của lứa tuổi, sẽ giúp trẻ phát triển tối ưu, nếu tác động giáo dục ngược lại sẽ kìm hãm sự phát triển,thậm chí gây khủng hoảng, tác hại cho trẻ\" (PGS.TS. Mạc Văn Trang)', 205000, '2021-11-05 22:24:40'),
(65, 'Tâm Lý Học Hành Vi', 'Robyn Conley Downs', 'Tâm Lý', '../../../assets/images/image_244718_1_1844.jpg', ' “Tâm lý học hành vi” giống như một liệu pháp tâm lý đối với tất cả chúng ta, khi phải đối mặt với cuộc sống bộn bề, hàng tá công việc phải giải quyết và những nỗi lo lắng, bận tâm không bao giờ chấm dứt. Cuốn sách đã chỉ ra những hành động, những suy nghĩ tiêu cực khiến con người luôn cảm thấy áp lực, nặng nề, để từ đó đưa ra các cách tư duy, phương pháp cụ thể để chúng ta có được sức khỏe, hạnh phúc và trạng thái cân bằng dài lâu trong cuộc sống.', 129000, '2021-11-05 22:26:05'),
(66, 'Nguyễn Công Hoan Truyện Ngắn Chọn Lọc', 'Nguyễn Công Hoan', 'Văn Học Việt Nam', '../../../assets/images/image_195509_1_42417.jpg', ' Đánh giá về bút pháp, nghệ thuật trong sáng tác của Nguyễn Công Hoan, nhà thơ Hoàng Trung Thông nhận định: \"…Nhìn thẳng vào sự thật và viết sự thật bằng tác phẩm văn học, đó là Nguyễn Công Hoan. Viết sự thật trung thành với sự thật, mà không sợ áp lực của bọn cường quyền. Đó là Nguyễn Công Hoan. Viết với cả tấm lòng, với  cả tình thương những người nghèo khổ, những người bị áp bức, bị chà đạp, tính xã hội kết hợp với tính nhân đạo. Đó cũng là Nguyễn Công Hoan ...\"', 200000, '2021-11-05 22:30:36'),
(67, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'Nguyễn Nhật Anh', 'Văn Học Việt Nam', '../../../assets/images/0_UtF1gVhC4WUVRqi4.png', ' Cuốn sách văn học Việt Nam hay xuất sắc gợi nhớ cho tôi một thế giới đầy những bất ngờ và hương vị thơ ngây cùng những suy nghĩ giản dị đến bình dị nhưng lại toát lên vẻ đẹp và gần gũi đến lạ thường. Câu chuyện “Tôi thấy hoa vàng trên cỏ xanh” có những lúc bấp bênh khúc này, khúc kia nên mỗi ai khi đọc cuốn sách này đều thấy mình trong đó nó mang đậm hương vị của một là thứ tình đầu đời của cu Thiều chẳng hạn… ngây thơ và khờ khạo.', 400000, '2021-11-05 22:33:24'),
(68, 'Mỗi Lần Vấp Ngã Là Một Lần Trưởng Thành', '	Liêu Trí Phong', 'Văn Học Việt Nam', '../../../assets/images/vvvv_7.jpg', ' Mỗi Lần Vấp Ngã Là Một Lần Trưởng Thành\r\n\r\n Cuộc đời là quá trình không ngừng trưởng thành.\r\n\r\nTrong quá trình này, bạn sẽ khó tránh khỏi vấp ngã, sẽ trải qua nhiều lần đau thương, và sẽ có những lúc bạn cảm thấy vô cùng mỏi mệt, nhưng hãy tin rằng, chỉ có những người đã từng đau thương thì mới trở nên vững vàng hơn', 90000, '2021-11-05 22:34:59'),
(69, 'Nếu Chỉ Còn Một Ngày Để Sống', 'Nicola Yoon', 'Văn Học Nước Ngoài', '../../../assets/images/sach-neu-chi-con-mot-ngay-de-song-206x300.jpg', ' Nếu Chỉ Còn Một Ngày Để Sống – nguyên tác Everything, Everything – là một trong những tác phẩm văn học nước ngoài bán chạy bình chọn trên tạp chí New York Times. Quyển sách cũng đã được chuyển thể thành phim điện ảnh, gây bão phòng vé trên toàn thế giới từ đó quyển sách càng được nhiều độc giả đón đọc.', 100000, '2021-11-05 22:36:24'),
(70, 'Túp Luề Bác Tôm', 'Edmondo De Amicis  Harriet Beecher Stowe', 'Văn Học Nước Ngoài', '../../../assets/images/8d1ab18eae036e7a4592fbb47030ff67.JPG.webp', ' Nước Mỹ mới được thành lập từ cuối thế kỷ XVIII sau khi đánh bại bọn thực dân Anh. Vừa ra đời, nó ra sức phát triển nên công nghiệp với ý đồ đuổi kịp và vượt các nước tư bản châu Âu.', 230000, '2021-11-05 22:37:53'),
(71, 'Đời Về Cơ Bản Là Buồn Cười', 'Dorling Kindersley', 'Văn Học Nước Ngoài', '../../../assets/images/image_195509_1_36276.jpg', ' Nhân vật ảo với chiếc bụng phệ, rốn lồi, khuôn mặt luôn tỏ vẻ tư lự, trên thông thiên văn, dưới tường địa lý, tam giáo, cửu lưu, tứ thư, ngũ kinh, tinh thần yêu nước trung trinh, đạo đức lung linh, phong tục, luật lệ, bản quyền, Horoscope, vật lý lượng tử... cái gì Lê Bích cũng tưởng là chàng biết.', 112000, '2021-11-05 22:39:13'),
(72, 'Chú Dê Đen', 'Nhiều Tác Giả', 'Thiếu Nhi', '../../../assets/images/image_121414.jpg', ' Chuyện kể về tình bạn thân thiết và trong sáng của hai cô bé Y Ban và Mơ. Câu chuyện cũng nói lên một phần về sự giao lưu văn hóa của người miền xuôi với người miền ngược thông qua quà tặng của hai bạn là chiếc áo hoa và chiếc váy thổ cẩm.', 10000, '2021-11-05 22:40:48'),
(73, 'Tấm Cám', 'Nhiều Tác Giả', 'Thiếu Nhi', '../../../assets/images/tam-cam.u547.d20170120.t100949.386890.jpg.webp', ' Bé Tập Kể Chuyện là bộ tranh truyện cổ tích, đồng thoại dành cho các bé tuổi mẫu giáo. Thông qua hình thức truyện kể có hình minh họa màu sinh động giúp các bé tiếp cận với những câu chuyện mang tính giáo dục được dễ dàng hơn, giúp hình thành nhân cách cho các bé sau này.\r\n\r\nTấm Cám là chuyện cổ tích mang tính giáo dục về sự yêu ghét và tính thiện ác dành cho các bé.', 12000, '2021-11-05 22:42:00'),
(74, ' Cuộc Sống Đồng Quê', 'Tân Việt', 'Thiếu Nhi', '../../../assets/images/image_80977.jpg', ' Cuốn bách khoa lý thú Thế giới động vật sẽ đưa các em đến với thế giới của các loài động vật hiện đang sinh sống ở các vùng miền khác nhau trên Trái đất như: sa mạc, lãnh nguyên, rừng nhiệt đới hay đồi núi… Những hình ảnh minh họa vô cùng sống động và cách miêu tả ngộ nghĩnh, gần gũi trong cuốn sách sẽ giúp các em dễ dàng tiếp cận và hiểu thêm nhiều về các đặc tính, cũng như môi trường sống tự nhiên của các loài động vật đáng yêu.', 23000, '2021-11-05 22:43:36'),
(75, 'Hai Anh Em', 'NXB Trẻ', 'Thiếu Nhi', '../../../assets/images/nxbtre_full_15232018_112348.jpg', ' Câu chuyện về hai anh em, người anh siêng năng làm lụng, chịu đựng khó khăn vất vả cuối cùng đã được ấm no, giàu có. Còn người em lại lười biếng, không muốn đụng tay đụng chân làm việc nên đói nghèo, rách rưới. Câu chuyện không chỉ đề cao giá trị của sức lao động mà còn thể hiện tình cảm anh em ruột thịt keo sơn.', 9000, '2021-11-05 22:44:57'),
(76, 'Gia Đình Giáo Dục', 'Thái Phỉ Nguyễn Đức Phong', 'Giáo Dục - Gia Đình', '../../../assets/images/gia-dinh-giao-duc.png', ' \"Nếu như trong Một nền giáo dục Việt Nam mới - Thải Phỉ bày tỏ sự quan tâm và tập trung chủ yếu vào phác thảo triết lý giáo dục, hình dáng tận cùng, lý tưởng của một nền giáo dục mới thì ở đây, ông tập trung chủ yếu vào giáo dục gia đình.”', 58000, '2021-11-05 22:46:42'),
(77, '100 Vấn Đề Giáo Dục Trong Gia Đình', 'Trần Quân', 'Giáo Dục - Gia Đình', '../../../assets/images/100-van-de-giao-duc-trong-gia-dinh-b6e9y_13783a78c48843209009356efef8db0b_master.jpg', ' \"100 vấn đề giáo dục trong gia đình\" với các điểm mới như:\r\n\r\nMục đích rõ ràng\r\nĐộc đáo về hệ thống\r\nCó góc nhìn mới\r\nTính hành động rất mạnh\r\nLà một tài liệu bổ ích cho các bậc phụ huynh, phù hợp với xu hướng giáo dục mới trong gia đình hiện đại.', 31000, '2021-11-05 22:47:57'),
(78, 'Gíao Trình Gíao Dục Gia Đình', 'Nguyễn Văn Tịnh', 'Giáo Dục - Gia Đình', '../../../assets/images/FullSizeRender.jpg', ' Gia đình là tế bào của xã hội, là giá trị vĩ đại nhất của loài người. Gia đình tốt thì xã hội mới tốt, xã hội tốt thì gia đình mới tốt. Xây dựng gia đình hạnh phúc và giáo dục con cái trong gia đình trở thành mối quan tâm hàng đầu của nhiều người trên thế giới hiện nay. ', 150000, '2021-11-05 22:50:05'),
(79, 'Lịch Sử Thế Giới Theo Dòng Sự Kiện', '	Jane Chisholm', 'Lịch Sử', '../../../assets/images/lich_su_the_gioi_theo_dong_su_kien-01.jpg', ' Lịch Sử Thế Giới Theo Dòng Sự Kiện - Từ Thời Đồ Đá Tới Thời Hiện Đại', 127000, '2021-11-05 22:51:32'),
(80, 'Lịch sử Việt Nam', 'Đào Duy Anh', 'Lịch Sử', '../../../assets/images/sach-lich-su-viet-nam-ban-chay-lich-su-viet-nam.jpg', ' Nếu quan tâm tới việc góp phần nâng cao hiểu biết của người dân về truyền thống văn hóa lịch sử đất nước, bạn nên sở hữu quyển “Lịch sử Việt Nam” của Đào Duy Anh biên soạn. Khác với phiên bản sách giáo khoa nặng về lịch sử chiến tranh, nội dung toàn những con số sự kiện khô khan và lồng vào đó những miêu tả đánh giá bằng ngôn từ nặng về cảm xúc chứ chưa khách quan, khoa học, cuốn sách này sẽ giúp bạn hoàn toàn có thể bù lấp “lỗ hổng lịch sử” để nhận thức được quy luật phát triển và tìm ra con đường phát triển phù hợp với thời đại mình.', 190000, '2021-11-05 22:52:53'),
(81, 'BỘ SÁCH LỊCH SỬ QUÂN SỰ VIỆT NAM(14 tập)', 'Nhiều Tác Giả', 'Lịch Sử', '../../../assets/images/ct-4.jpg', ' Để tiếp tục phát huy truyền thống lịch sử vẻ vang của dân tộc ta qua bao cuộc chiến tranh, đặc biệt là Chiến thắng Điện Biên Phủ “Lừng Lẫy Năm Châu, Chấn Động Địa Cầu”, khẳng định sự lãnh đạo sáng suốt của Đảng Cộng sản Việt Nam, Chủ tịch Hồ Chí Minh, tinh thần đại đoàn kết dân tộc và sức mạnh của Quân Đội Nhân Dân Việt Nam là nhân tố quyết định mọi thắng lợi của cách mạng Việt Nam; khẳng định ý nghĩa và giá trị lịch sử vĩ đại của của lực lượng Quân Đội Nhân Dân Việt Nam. Nhằm ghi nhận và tuyên truyền đến thế hệ sau về những đóng góp vô cùng to lớn của lực lượng Quân Đội Nhân Dân Việt Nam trong công cuộc xây dựng và bảo vệ tổ quốc', 2950000, '2021-11-05 22:54:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `phone`, `email`, `level`, `ngaytao`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Ngọc Hải', '0869215201', 's2ngochai01@hotmail.com', 1, '2021-11-05 14:17:24'),
('hai321', '202cb962ac59075b964b07152d234b70', 'Nguyễn Ngọc Hải12', '086921520112', 's2bluemoon01@gmail.com', 0, '2021-11-06 22:55:53'),
('s2blueeyes01', '202cb962ac59075b964b07152d234b70', 'Tú', '0833146619', 's2bluemoon01@gmail.com', 0, '2021-11-05 23:26:39'),
('s2bluemoon01', '202cb962ac59075b964b07152d234b70', 'Nguyễn Ngọc Hải', '0869215201', 's2bluemoon01@gmail.com', 0, '2021-11-05 23:26:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oder_id` (`order_id`),
  ADD KEY `masach` (`masach`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
