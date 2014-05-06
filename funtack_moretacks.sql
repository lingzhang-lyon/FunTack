
insert into tacks (tack_id,user_id, website_url, picture_url, description ) values
(7,1, 'http://www.sperience.com/travel/gunnel-bildts-pic-of-top-travel-destinations-2-of-10',
'http://www.sperience.com/wp-content/uploads/2014/04/gunnel-bildt-travel-106.jpg','Affordable Muralists'),
(8,1, 'http://www.blamethemonkey.com/2013-travel-photography-year-in-review',
'http://www.blamethemonkey.com/wp-content/uploads/2013/01/Elia-Locardi-Travel-Photography-Sydney-Lights-Australia-1440-WM.jpg','2013 Travel Photography Year in Review'),
(9,1, 'http://www.travelchannel.com/interests/travels-best/photos/travels-best-for-2014?page=2',
'http://www.sperience.com/wp-content/uploads/2014/04/gunnel-bildt-travel-106.jpg','Travels Best for 2014 Luxury hostels, Cuba, local brew pubs and the Jersey Shore'),
(10,1, 'http://www.incentivemag.com/Incentive-Travel/United-States/Articles/Going-Solo--Individual-Travel-Awards-Mean-Flexibility-for-Winners/',
'http://www.incentivemag.com/uploadedImages/Travel/International/Hi_MYK_33595855_MYK-074.jpg','Going Solo: Individual Travel Awards Mean Flexibility for Winners'),
(11,1, 'http://www.cntraveler.com/features/2013/03/how-the-one-percent-travels-luxury-vacations',
'http://www.cntraveler.com/features/2013/03/how-the-one-percent-travels-luxury-vacations/_jcr_content/par/cn_contentwell/par-main/cn_image.size.arctic-kingdom-polar-expeditions-luxury-ice-camp.jpg','How to Vacation Like a Billionaire');

insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(3,6,1, 'MyTravel', 'my Travel information collection','2014-05-04 00:00:01', 0);

insert into board_tacks (board_id, tack_id) values (3,7),(3,8),(3,9),(3,10),(3,11);
	

insert into tacks (tack_id,user_id, website_url, picture_url, description ) values
(12,2, 'http://luxurytravelvietnam.com/blog/?tag=hanoi-tours',
'http://luxurytravelvietnam.com/blog/wp-content/uploads/2009/09/EvasonHideawayNinhVanBayNhatrangvietnam.jpg','hanoi tours Luxury Travel Blog'),
(13,2, 'http://www.budgettravel.com/slideshow/budget-travel-photos-trip-inspiring-photos-of-mexico,25993/',
'http://images.budgettravel.com/washington-dcjefferson-memorialexterior13951137-3282014-234851_panoramic.jpeg','35 Trip-Inspiring Photos of Mexico'),
(14,2, 'http://www.marketwatch.com/story/top-10-international-travel-spots-for-2014-2014-03-27',
'http://ei.marketwatch.com/Multimedia/2014/02/14/Photos/MG/MW-BU745_TopTra_20140214203614_MG.jpg?uuid=95d21c60-95e1-11e3-b7be-00212803fad6','Top 10 international travel spots for 2014');

insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(4,6, 2, 'HelloTravel', 'I love travalling','2014-05-04 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (4,12),(4,13),(4,14);

insert into tacks (tack_id, user_id, website_url, picture_url, description ) values
(15,1, 'http://theleadinghotels.wordpress.com/page/2/',
'http://www.eurolodgings.com/holland/images/hotel%20d%20l%20europe.jpg','The leading hotals of the world'),
(16,1, 'http://www.bodegasprotos.com/es/actualidad/376/el-radisson-royal-el-hotel-mas-lujoso-de-moscu-alberga-la-presentacion-de-protos-ante-el-publico-ruso/',
'http://www.bodegasprotos.com/galeria/fotto_not_376_1.jpg','EL RADISSON ROYAL, EL HOTEL'),
(17,1, 'http://travelsort.com/blog/best-seoul-5-star-luxury-hotels',
'http://damhyul3s75yv.cloudfront.net/photos/5354/original_Best_Seoul_5-Star_Luxury_Hotels-Lotte_Seoul_Hotel.jpg','Best Seoul 5-Star Luxury Hotels'),
(18,1, 'http://www.taxiboat.it/bellagio_luxury_resort_lake_como.htm',
'http://www.taxiboat.it/hotel_villa_serbelloni.jpg','luxury hotel Villa Serbelloni Grand Hotel Villa Serbelloni');


insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(5,6, 1, 'MyHotel', 'luxury hotels','2014-05-05 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (5,15),(5,16),(5,17),(5,18);


insert into tacks (tack_id, user_id, website_url, picture_url, description ) values
(19,2, 'http://www.picturesdepot.com/cars/16643/blue+convertible+rolls-royce.html',
'http://images.picturesdepot.com/photo/b/blue_convertible_rolls-royce-16643.jpeg','Blue Convertible Rolls-Royce'),
(20,2, 'https://www.flickr.com/photos/automotiveappearancedottv/1974850805/',
'https://c1.staticflickr.com/3/2213/1974850805_ae3a1900dd.jpg','SEMA Cars 2007 - Import Cars'),
(21,2, 'http://luxury-sportscars.blogspot.com/2010/12/sports-cars-are-lot-of-fun.html',
'http://3.bp.blogspot.com/_Oqw9XRrbCZE/TP9_owaZNyI/AAAAAAAAAHM/nk332yWsT0w/s1600/Sports+Cars+Are+a+Lot+of+Fun3.jpg','Luxury Sports Cars');

insert into categories (id, name) values (7,"Car");
insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(6,7, 2, 'HelloCars', 'I love luxury cars','2014-05-06 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (6,19),(6,20),(6,21);
	

insert into tacks (tack_id, user_id, website_url, picture_url, description ) values
(22,1, 'http://jingdaily.com/tag/guo-pei/',
'http://jingdaily.com/wp-content/uploads/2013/01/guopei39.jpg','Jing Daily: The Business of Luxury'),	
(23,1, 'http://www.mymilkglassheart.com/2010/12/07/6831/',
'http://www.mymilkglassheart.com/wp-content/uploads/2010/12/Guo-Pei.jpg','Chinese designer Guo Pei is blowing my mind.'),
(24,1, 'http://ilovegamereviews.blogspot.com/2013/09/diablo-3-tips-for-ps3-and-xbox-360-pony.html',
'http://2.bp.blogspot.com/-92FLh0Jt0bU/Uigsat5ifyI/AAAAAAAAD0M/heOcyzkmT3Y/s1600/diablo-3-tips-and-tricks.jpg','Diablo 3'),
(25,1, 'http://www.luxurytravelmagazine.com/property/the-westin-melbourne-australia-luxury-hotels.php',
'http://www.luxurytravelmagazine.com/images/trips/Westin-Melbourne-luxury-hotels-1_big.jpg','Deluxe hotel in the world Deluxe Hotel In The World');

insert into categories (id, name) values (8,"Design");
insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(7,8, 1, 'Design Collection', 'I love desing things','2014-05-05 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (7,22),(7,23),(7,24),(7,25);
	
	
insert into tacks (tack_id, user_id, website_url, picture_url, description ) values
(26,2, 'http://www.freshboo.com/horse-pictures/',
'http://www.freshboo.com/wp-content/uploads/2014/04/black-and-white-horse.jpg','25 Majestic and Beautiful Horse'),
(27,2, 'http://www.actressphotoshoot.com/2013/01/horse-desktop-hd-wallpapers.html',
'http://1.bp.blogspot.com/-DINjNvPhcho/UPJX3LjdqKI/AAAAAAAAPhk/kUg0OZy7ark/s1600/Horse++%281%29.jpeg','Wall paper about horse'),
(28,2, 'http://www.lakeridgegypsy.com/',
'http://www.lakeridgegypsy.com/images/Gypsy_Vanner_HOrses_Ster8581-25.jpg','Gypsy Vanner Horses'),
(29,2, 'http://www.theatlantic.com/business/archive/2011/09/want-to-be-a-better-worker-please-consult-this-horse/244332/',
'http://cdn.theatlantic.com/static/mt/assets/business/615%20horse.png','Horses have long been romanticized for possessing a mysterious innate intelligence');

insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(8,3, 2, 'Horse', 'I love horse','2014-05-06 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (8,26),(8,27),(8,28),(8,29);

	
insert into tacks (tack_id, user_id, website_url, picture_url, description ) values
(30,1, 'http://www.hhcolorlab.com/create/sports/sports_club',
'http://www.hhcolorlab.com/portals/1/images/sports/sports_club/SPORTS_SportsClub_main.jpg','The 2014 Sports Club membership signups have ended.'),
(31,1, 'http://www.businessinsider.com/why-frozen-is-box-office-success-2014-1',
'http://static5.businessinsider.com/image/52e981fe69beddf605e84e7a-960/elsa-disney-frozen.jpg','Why Frozen Is Huge Box-Office'),
(32,1, 'http://disneyparks.disney.go.com/blog/2013/12/three-disney-cruise-line-ships-sailing-from-port-canaveral-in-early-2014/',
'http://parksandresorts.wdpromedia.com/media/disneyparks/blog/wp-content/uploads/2013/11/Mickey-Minnie-Kissing-Castaway.jpg','Port Canaveral is just about a one-hour drive from Walt Disney'),
(33,1, 'http://www.weightwatchers.com/util/art/index_art.aspx?tabnum=1&art_id=204111&sc=3048',
'http://aka.weightwatchers.com/images/1033/dynamic/GCMSImages/DestinationGuide_Disney_Intro_0703AS_0083DR84668089_main.jpg','Destination Guide: Walt Disney World'),
(34,1, 'http://www.fodors.com/news/disney-expert-weddings-dining-plan-more-6514.html',
'http://www.fodors.com/wire/disney-wedding.jpg','Ask a Fodor\'s Disney Expert'),
(35,1, 'http://www.unl.edu/lincoln/sports',
'http://www.unl.edu/lincoln/images/play_sports.jpg','Nebraska Cornhusker Athletics are known for excellence');

insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(9,5, 1, 'Sports and Fun', 'A lot of fun with sports','2014-05-06 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (9,30),(9,31),(9,32),(9,33),(9,34),(9,35);
	
insert into tacks (tack_id, user_id, website_url, picture_url, description ) values
(36,1, 'http://content.time.com/time/photogallery/0,29307,2000441,00.html',
'http://img.timeinc.net/time/photoessays/2010/animal_soccer/animal_soccer_01.jpg','Animal Soccer.'),
(37,1, 'http://blog.betdsi.com/nba-betting-lakers-celtics-highlights-tnt-thursday-night/',
'http://blog.betdsi.com/wp-content/uploads/Boston-Celtics-Los-Angeles-Lakers.jpg','NBA Betting: Lakers-Celtics Highlight'),
(38,1, 'http://www.apple.com/retail/fifthavenue/',
'http://images.apple.com/retail/store/galleries/fifthavenue/images/fifthavenue_gallery_image1.jpg','Apple Retail Store - Fifth Avenue'),
(39,1, 'http://blogs.telegraph.co.uk/finance/thomaspascoe/100018574/the-price-of-gold-has-been-manipulated-this-is-more-scandalous-than-libor/',
'http://blogs.telegraph.co.uk/finance/files/2012/07/gold.jpg','Governments can\'t will gold into existence.');

insert into boards (board_id, category_id, user_id, name,description,created_date, privacy) values
	(10,5, 1, 'Interesting things', 'Everything I like','2014-05-06 00:00:01', 0);
insert into board_tacks (board_id, tack_id) values (10,36),(10,37),(10,38),(10,39);



	




	










