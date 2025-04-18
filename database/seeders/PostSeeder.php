<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // $posts = [
        //     // 運動
        //     [
        //         'page_id' => 1,
        //         'title' => 'NBA季後賽熱血開打',
        //         'content' => '今年的NBA季後賽可以說是精彩絕倫，無論是東區還是西區的對戰，都充滿了懸念和刺激的比賽。每一場比賽的對抗都讓人心跳加速，特別是一些明星球員的表現讓我們感受到了真正的籃球魅力。今年的冠軍爭奪戰中，許多球隊都顯示出了強大的實力，不僅有經驗豐富的老將，也有年輕球員的崛起。你最支持哪支隊伍呢？誰能在這場激烈的爭奪中脫穎而出，最終獲得總冠軍呢？這場季後賽無疑是每個籃球迷期待已久的盛事，不容錯過！來聊聊你對今年季後賽的看法，讓我們一起討論最有可能進入總決賽的隊伍，還有最關鍵的球員。'
        //     ],
        //     [
        //         'page_id' => 1,
        //         'title' => '健身菜鳥求救',
        //         'content' => '開始重訓的過程對許多人來說都是既興奮又有些許迷茫，尤其是當你還是新手的時候，總會有很多問題需要解答。初學者最常碰到的困難就是不確定該如何規劃訓練計畫，畢竟健身不僅僅是簡單的舉重或跑步，還需要考慮到各種肌群的訓練、訓練頻率、飲食和恢復等方面。那麼，對於像我這樣的菜鳥來說，應該如何開始設計一個適合自己的健身菜單呢？而且，我還擔心自己一開始的訓練量過大，會不會受傷呢？希望大家能分享一下自己新手時的經驗，哪些訓練方式對新手最有效，還有怎麼避免常見的健身錯誤。你的建議對我來說將是非常有幫助的！'
        //     ],
        //     [
        //         'page_id' => 1,
        //         'title' => '馬拉松裝備推薦',
        //         'content' => '對於跑者來說，選擇合適的馬拉松裝備至關重要，因為它會直接影響到你的比賽表現和舒適度。首先，跑鞋是最重要的一項裝備，一雙適合自己足型和跑步風格的鞋子能減少受傷的風險，並提高跑步的效率。接著，運動服的選擇也不容忽視，透氣性好的衣物能有效排汗，保持身體乾爽，避免過多的摩擦引起皮膚不適。還有一些人可能會覺得，選擇運動手錶也很重要，這不僅可以幫助你記錄自己的步伐和時間，還能了解自己的心率和消耗的卡路里。其他裝備如跑步背心、運動補給和防曬霜等，也能讓你在比賽過程中感到更舒適，避免受到外界因素的干擾。跑者們，你們有沒有推薦的品牌或者裝備呢？希望能分享一些經驗，幫助大家挑選最適合的裝備。'
        //     ],
        //     // 美食
        //     [
        //         'page_id' => 2,
        //         'title' => '台南小吃推薦',
        //         'content' => '台南是台灣著名的美食天堂，每次去台南都讓人充滿期待，因為每個角落都能發現美味的食物。無論是傳統的小吃，還是創意十足的現代料理，都讓人垂涎欲滴。像是著名的台南擔仔麵，不僅麵條Q彈，湯頭更是鮮美無比，配上滷蛋和滷肉，真的是讓人一口接一口。還有台南的蚵仔煎，鮮美的蚵仔與雞蛋、粉漿混合，煎至金黃酥脆，口感層次豐富，搭配特製的醬料，絕對是讓人回味無窮的美味。當然，台南的小吃不僅限於這些，還有像是牛肉湯、魚丸湯、花生冰等，每一道都讓你難以選擇。如果你下次要去台南旅遊，記得一定要把這些經典小吃列入你的必吃清單，保證你不會失望！'
        //     ],
        //     [
        //         'page_id' => 2,
        //         'title' => '自己做壽司初體驗',
        //         'content' => '昨天自己捲壽司好有成就感，分享照片給大家看！自己動手做壽司的過程既有趣又有挑戰，雖然聽起來簡單，但要做出美味的壽司卻需要一些技巧和細心。首先，選擇新鮮的食材是最關鍵的，特別是魚類和海鮮，這些食材直接影響到壽司的口感和風味。製作壽司飯時，需要注意米的比例和醋的調配，這是能讓飯粒保持Q彈的關鍵。然後就是捲壽司的技巧了，要確保材料放在紫菜中央，捲起來的時候要均勻而緊實，這樣切出來的壽司才會美觀且不會散開。除了傳統的生魚片壽司外，我也嘗試了一些創意壽司，比如用煙燻鮭魚、牛肉片或者蔬菜做的壽司，味道新鮮又充滿驚喜。這次的壽司初體驗真的讓我對烹飪有了更深的認識，感覺自己像個廚神！如果你也有興趣，不妨嘗試看看，分享你的創意壽司經驗吧！'
        //     ],
        //     [
        //         'page_id' => 2,
        //         'title' => '深夜泡麵加料法',
        //         'content' => '來說說大家的泡麵加料怪招～深夜時分，當肚子餓得不行時，泡麵總是最方便的選擇。不過，單純的泡麵可能會顯得有點單調，這時候就可以加入一些創意的加料，讓泡麵的風味大大提升。最常見的加料就是加入一些蛋類，像是煎蛋或水煮蛋，蛋黃的濃郁味道與湯頭相融合，讓整碗麵更加美味。另外，加入蔬菜也是一個不錯的選擇，不僅能增加營養，還能讓味道更加清爽，像是青菜、玉米、洋蔥等，都是非常好的選擇。如果你喜歡辣味，可以加入一些辣椒或辣醬，為泡麵增添一點刺激感。而且，如果你有剩餘的燒肉、火鍋料或是香腸等，也可以放進去，這樣一碗豐富的泡麵就完成了，讓你在深夜也能享受到滿滿的幸福感！大家還有什麼泡麵加料的小秘密嗎？快來分享吧！'
        //     ],
        //     // 國內大小事
        //     [
        //         'page_id' => 3,
        //         'title' => '高鐵票價又要漲？',
        //         'content' => '通勤族壓力山大，希望能有補助措施。近日，國內的高鐵票價再次引發了不少市民的關注。每當票價上漲，總是引起民眾的不滿，尤其是通勤族，他們的日常生活已經被高額的交通費壓得喘不過氣來。根據交通部的公告，這次票價調整是基於成本上升和維護經費增加的原因，不過這樣的調漲仍然讓許多人感到無奈。對於每天需要搭乘高鐵上下班的通勤族來說，這無疑是一個沉重的負擔。更有不少人提出，是否能夠提供一些補助措施來減輕民眾的負擔，尤其是對於低收入家庭或是需要長途通勤的人來說，這種價格的上漲無疑會影響到他們的生活品質。大家對於這次的票價調整有什麼看法呢？你認為是否應該進行更合理的調整？'
        //     ],
        //     [
        //         'page_id' => 3,
        //         'title' => '選舉快到了，你怎麼看',
        //         'content' => '討論政策，不吵架，理性交流！每到選舉季，社會上總會掀起一陣熱議，尤其是政治議題的討論，更是熱烈。隨著選舉的日益臨近，各候選人紛紛展開激烈的競爭，提出各種改革方案和承諾，試圖爭取選民的支持。然而，選舉期間的辯論和宣傳也充斥著各種聲音，有時候真讓人感到困惑。選民們往往在多種政策選擇中進行抉擇，但同時也會考量候選人的背景、過去的表現和理念等因素。理性選舉，是每個公民的責任，但有時候情感的因素也會影響決策。在這樣的環境下，我們如何做出最合適的選擇？選舉帶來的不僅是政策的改變，更是未來四年乃至更長時間的政治局勢。我們應該如何理性地對待選舉，並保持對政治熱忱的同時，也不失冷靜的思考？'
        //     ],
        //     [
        //         'page_id' => 3,
        //         'title' => '颱風天上班有解嗎',
        //         'content' => '颱風假到底誰說了算？討論災害應變制度。每當颱風來襲，最令通勤族頭痛的問題就是：到底該不該去上班？尤其是當颱風強度升級，風雨越來越大，是否還能安全通勤成為了最大疑慮。許多公司和機構在颱風天會決定放假或允許員工在家工作，但也有不少企業仍要求員工到辦公室報到，這就讓很多人感到困惑。究竟這樣的安排是否合理？有些人認為，即便是颱風天，也可以根據個人情況選擇工作方式，像是遠程工作或者在家處理一些事務，但也有一些人覺得，不到公司直接影響到工作的效率與團隊合作。另一方面，現行的災害應變制度也並不完善，有時候相關機構未能及時宣布放假或停班，導致大家仍需冒險外出，這不僅增加了交通事故的風險，還可能影響到自身安全。大家對於這樣的情況有何看法？你曾經因為颱風天而在上班路上經歷過哪些不便呢？如何看待這樣的工作安排？'
        //     ],
        //     // 電玩遊戲
        //     [
        //         'page_id' => 4,
        //         'title' => '艾爾登法環DLC心得',
        //         'content' => '新Boss難度爆表，你打贏了嗎？《艾爾登法環》的DLC無疑是今年最令人期待的遊戲更新之一，這次的DLC帶來了全新的挑戰和令人興奮的遊戲內容。新DLC中的Boss戰難度爆表，對於喜歡挑戰的玩家來說，這無疑是一次心跳加速的冒險。每次與新Boss的對決都需要極高的策略性和反應能力，特別是在面對那種攻擊模式變化多端的敵人時，往往要進行多次嘗試才能成功擊敗。更讓人驚喜的是，這次DLC的場景設計也相當出色，玩家可以探索更多未知的領域，發現新地點，並解鎖更多的隱藏內容和道具。總的來說，這次的DLC對於《艾爾登法環》的玩家來說是一個大獎，無論是遊戲內容的豐富性還是難度設計的巧妙，都讓這次更新值得一試。你有挑戰過這些新的Boss嗎？快來分享你的心得與戰術吧！'
        //     ],
        //     [
        //         'page_id' => 4,
        //         'title' => 'Switch派對遊戲推薦',
        //         'content' => '要辦聚會，有哪些遊戲適合多人同樂？Switch是目前最受歡迎的遊戲主機之一，不僅因為它的便捷性和創新的設計，還因為它擁有大量適合多人遊玩的派對遊戲。無論是朋友聚會還是家庭活動，Switch上的派對遊戲都能讓大家開心玩樂。其中，我最推薦的幾款遊戲包括《瑪利歐賽車8豪華版》，這款遊戲不僅操作簡單有趣，還能讓每個人都能迅速上手，帶來激烈的賽車對抗；另外，《任天堂明星大亂鬥》也是一款極具娛樂性的派對遊戲，玩家可以選擇自己喜愛的角色進行對戰，對於喜歡競爭的玩家來說非常過癮。還有《Super Bomberman R》，這款遊戲適合和朋友們一起進行策略性遊戲，分組對戰，互相設陷阱，完全不會讓人覺得無聊。如果你也有其他推薦的Switch派對遊戲，趕快分享一下，讓我們一起打造最熱鬧的遊戲派對吧！'
        //     ],
        //     [
        //         'page_id' => 4,
        //         'title' => 'Steam特價清單分享',
        //         'content' => '這次折扣哪些遊戲CP值高？快來交流。每年Steam的特價活動總是吸引了大量玩家的關注，特別是那些平時可能因為價格較高而猶豫不決的遊戲，這時候都能以更優惠的價格購得。近期的Steam特賣活動中，有幾款遊戲讓我忍不住加入了購物車。首先是《文明VI》，這款經典策略遊戲不僅能讓你體驗建設一個強大帝國的樂趣，還能挑戰你的智謀與策略。還有《地鐵：離去》，這款第一人稱射擊遊戲以其精緻的劇情和驚心動魄的遊玩體驗，讓玩家深陷其中，根本無法自拔。而如果你是RPG愛好者，那麼《巫師3：狂獵》絕對是不可錯過的遊戲，無論是故事深度還是遊玩自由度，都讓人驚嘆不已。對了，還有《俄羅斯方塊效應》這款非常治癒的遊戲，簡單卻讓人上癮，非常適合輕鬆放鬆時遊玩。這些遊戲在特價期間價格超值，非常值得入手！如果你最近也有在關注哪些遊戲的特價，來和大家分享一下吧！'
        //     ],
        //     // 感情
        //     [
        //         'page_id' => 5,
        //         'title' => '遠距離戀愛真的行嗎？',
        //         'content' => '每天都靠視訊聯絡，但還是有點不安全感。遠距離戀愛是現代都市中越來越常見的情感狀況，尤其是隨著工作、學業等原因，很多情侶不得不面對異地戀的考驗。雖然科技的發展讓我們可以隨時隨地通訊，但面對遠距離戀愛，依然充滿挑戰。首先，缺乏日常的陪伴和面對面的交流，容易讓感情逐漸疏遠。即便是通過視訊或電話聯絡，總是無法完全取代實際的見面時光，這樣的距離感可能會讓人產生不安感。再者，缺少了相處的日常，許多小摩擦也無法即時解決，這樣積累的問題可能會讓彼此關係產生裂痕。然而，也有一些情侶能夠成功經營遠距離戀愛，關鍵在於雙方的信任和默契。如果你也在經歷遠距離戀愛，或者有過這樣的經歷，快來分享你的看法吧！你覺得遠距離戀愛是否能夠持久？如何克服這些挑戰？'
        //     ],
        //     [
        //         'page_id' => 5,
        //         'title' => '被喜歡的人已讀不回',
        //         'content' => '到底該不該主動再密一次？好猶豫。在現代的戀愛關係中，已讀不回似乎成為了一個非常讓人困惑的現象。當你發送了一條訊息給對方，並且看到對方已經讀了，但卻久久沒有回應，這種情況往往會讓人感到焦慮和不安。究竟是對方在忙碌，還是對這段關係的熱情漸漸消退？這樣的疑問常常困擾著許多人。或許有時候對方真的是因為事情太多，無暇回覆，但也可能是情感上有了些微的變化，讓他們選擇了冷淡處理。不過，我們不妨換個角度來看，或許主動再次聯絡對方，了解情況，並表達自己的心情，這樣能夠解開心中的疑惑，避免誤解。對於這種已讀不回的情況，你是選擇冷處理還是主動再聯絡呢？快來分享你的看法吧！'
        //     ],
        //     [
        //         'page_id' => 5,
        //         'title' => '曖昧期該不該表白？',
        //         'content' => '怕破壞關係，但又不想再拖了。曖昧期是戀愛關係中最微妙的一段時間，這段期間雙方通常會有好感，但尚未明確表白，也沒有確立關係。此時，很多人都會在是否該表白的問題上掙扎。表白過早，可能會讓對方感到壓力，甚至可能失去這段關係的發展空間；但如果不表白，雙方的關係可能會停滯不前，甚至產生不必要的誤解。那麼，曖昧期到底該不該表白呢？有些人認為，表白是為了讓對方知道自己對這段關係的期待，並清楚地確認彼此的立場；而另一些人則覺得，這段時間應該留給兩人更多的了解和相處，直到彼此更有確定感再表白。對你來說，曖昧期的表白時機如何把握才是最合適的呢？你曾經有過表白的經歷嗎？分享一下你的故事吧！'
        //     ]
        // ];

        // foreach ($posts as $post) {
        //     Post::create($post);
        // }
        Post::factory(10)->create();
    }
}
