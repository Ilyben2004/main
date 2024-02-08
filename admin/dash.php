<?php

require '../php/Functions.php';
session_start();
if (isset($_SESSION['username'])) {
    // Redirect to another page
	$user=$_SESSION['username'];
}


 


 

 



?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/jpeg" href="../gym.jpeg"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <meta charset="UTF-8">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  
<div class="dashboard">
	
	<aside class="search-wrap">
		<div class="search">
		
		</div>
		<div class="user-actions">
			<button id="buttonmessage">

			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7.07046 10.26C7.96453 7.86801 9.19303 7.03601 11.2132 7.03601C13.2334 7.03601 14.4619 7.86801 15.356 10.26C15.3728 10.3055 15.3862 10.3524 15.396 10.4L16.5543 15.917C16.6155 16.2008 16.5485 16.4978 16.3719 16.7251C16.1953 16.9525 15.928 17.0858 15.6446 17.088H13.3173C13.37 17.6989 13.1737 18.3048 12.7751 18.7618C12.3764 19.2188 11.811 19.4861 11.2132 19.5C10.6151 19.4861 10.0494 19.2186 9.65063 18.7611C9.25191 18.3037 9.05587 17.6972 9.10918 17.086H6.78186C6.49847 17.0838 6.2312 16.9505 6.0546 16.7231C5.878 16.4958 5.81096 16.1988 5.87218 15.915L7.03048 10.4C7.04027 10.3524 7.05363 10.3055 7.07046 10.26Z" stroke="#000000" stroke-width="1.5" stroke-linejoin="round"></path> <path d="M9.10921 16.336C8.69499 16.336 8.35921 16.6718 8.35921 17.086C8.35921 17.5002 8.69499 17.836 9.10921 17.836V16.336ZM13.3173 17.836C13.7315 17.836 14.0673 17.5002 14.0673 17.086C14.0673 16.6718 13.7315 16.336 13.3173 16.336V17.836ZM9.62888 4.75C9.21467 4.75 8.87888 5.08579 8.87888 5.5C8.87888 5.91421 9.21467 6.25 9.62888 6.25V4.75ZM12.7976 6.25C13.2118 6.25 13.5476 5.91421 13.5476 5.5C13.5476 5.08579 13.2118 4.75 12.7976 4.75V6.25ZM9.10921 17.836H13.3173V16.336H9.10921V17.836ZM9.62888 6.25H12.7976V4.75H9.62888V6.25Z" fill="#000000"></path> </g></svg>

			</button>

	
			<button>
				<a href="../index.php">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z"/><path d="M11 2h2v10h-2z"/></svg>
				</a>	</button>
		</div>
	</aside>
	
	<header class="menu-wrap">
		<figure class="user">
			<div class="user-avatar">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
			</div>
			<figcaption>
				<?php  echo $user ?>
			</figcaption>
		</figure>
	
		<nav>
			<section class="dicover">
				<h3>Discover</h3>
				
				<ul>
				<li>
						<a href="">
						<svg width="24" height="24"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a,.b{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}.a{fill-rule:evenodd;}</style></defs><path class="a" d="M2,2V20a2,2,0,0,0,2,2H22"></path><rect class="b" height="6" rx="1.5" width="3" x="6" y="12"></rect><rect class="b" height="6" rx="1.5" width="3" x="12" y="7"></rect><rect class="b" height="6" rx="1.5" width="3" x="18" y="3"></rect></g></svg>
						Dashboard
						</a>
					</li>
					<li>
						<a href="pages\add-number\add.php">
						<svg width="24" height="24" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.0009 21.3201H8.43094C7.33237 21.2923 6.27951 20.8746 5.4606 20.1418C4.64169 19.409 4.11011 18.4088 3.96094 17.3201L2.96094 9.32007" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9992 9.32007L20.6992 11.8201" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3 9.32004C8.81444 7.20973 15.1856 7.20973 21 9.32004" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.42969 8.34006L9.07969 3.32007" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.5699 8.34006L14.9199 3.32007" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 22.8201V14.8201" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 18.8201H23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
							Add a new product
						</a>
					</li>
					
					<li>
						<a href="pages\display\display.php">
						<svg width="24" height="24" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="0" fill="none" width="20" height="20"></rect> <g> <path d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5 .71 0 1.39.15 2 .42.61-.27 1.29-.42 2-.42 2.76 0 5 2.24 5 5v2zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6zm10 2V6c0-1.65-1.35-3-3-3h-.02c.63.84 1.02 1.87 1.02 3v2h2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22z"></path> </g> </g></svg>
							All Products
						</a>
					</li>
					<li>
						<a href="pages\display_commandes\display.php">
						<svg  width="24" height="24" fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>shipping</title> <path d="M16.722 21.863c-0.456-0.432-0.988-0.764-1.569-0.971l-1.218-4.743 14.506-4.058 1.554 6.056-13.273 3.716zM12.104 9.019l9.671-2.705 1.555 6.058-9.67 2.705-1.556-6.058zM12.538 20.801c-0.27 0.076-0.521 0.184-0.765 0.303l-4.264-16.615h-1.604c-0.161 0.351-0.498 0.598-0.896 0.598h-2.002c-0.553 0-1.001-0.469-1.001-1.046s0.448-1.045 1.001-1.045h2.002c0.336 0 0.618 0.184 0.8 0.447h3.080v0.051l0.046-0.014 4.41 17.183c-0.269 0.025-0.538 0.064-0.807 0.138zM12.797 21.811c1.869-0.523 3.79 0.635 4.291 2.588 0.501 1.951-0.608 3.957-2.478 4.48-1.869 0.521-3.79-0.637-4.291-2.588s0.609-3.957 2.478-4.48zM12.27 25.814c0.214 0.836 1.038 1.332 1.839 1.107s1.276-1.084 1.062-1.92c-0.214-0.836-1.038-1.332-1.839-1.109-0.802 0.225-1.277 1.085-1.062 1.922zM29.87 21.701l-11.684 3.268c-0.021-0.279-0.060-0.561-0.132-0.842-0.071-0.281-0.174-0.545-0.289-0.799l11.623-3.25 0.482 1.623z"></path> </g></svg>
							All Commands
						</a>
					</li>
					<li>
						<a href="pages\display_users\display.php">
							<svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.5 21C21.8807 21 23 19.8807 23 18.5C23 16.1726 21.0482 15.1988 19 14.7917M15 11C17.2091 11 19 9.20914 19 7C19 4.79086 17.2091 3 15 3M3.5 21.0001H14.5C15.8807 21.0001 17 19.8808 17 18.5001C17 14.4194 11 14.5001 9 14.5001C7 14.5001 1 14.4194 1 18.5001C1 19.8808 2.11929 21.0001 3.5 21.0001ZM13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
							All Users
						</a>
					</li>
					<li>
						<a href="pages\chat\chat.php">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 9H17M7 13H17M21 20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>		Chat				</a>
						
					</li>
					
					
				
				</ul>
			</section>
		
			
			
			
		</nav>
	</header>

	<main id="mainmenu" class="content-wrap">

	<div id="menu">



	
	<table>
		<tr>
			<td disp="allchartsProducts" class="chosen" >Products Statistiques </td>
			<td disp="categoryschart">Ctegorys Statistiques </td>
			<td disp="userschart">Users Statistiques </td>

		</tr>
	</table>
	</div>

	<!-- ************************************************************************ PRODUCTS CHARTS *****************************************************************************************-->

<div id="allchartsProducts">

	<div id="stasContainer">


	<div class="charts">
		<center><div class="search">
		<label for="search">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input id="oneInput" class="searchInput" type="text" placeholder="Id or Title" id="search">
			</label>
		
		</div></center>
		<canvas id="searchChartProduct">

		</canvas>


		

	</div>
	<div class="charts">
		<div class="selects">
	<select id="allProductsChartSelectDate"  class="form-select" aria-label="Default select example">
  <option value="7">Last 7 days</option>
  <option value="30">Last Month</option>
  <option value="180">Last 6 Months</option>
  <option value="365">Last Year</option>
  <option value="100000">All Times</option>

</select>
<select id="allProductsChartSelectGenre"  class="form-select" aria-label="Default select example">
  <option value="All Genres">All Genres</option>
  <option value="male">Hommes</option>
  <option value="female">Females</option>

</select>

    </div>


<canvas id="allProductsChart">

</canvas>
		
	</div>
	</div>
	<br>
<!-- *******************************************************************************-->
	<div id="stasContainer">

	<div class="charts">
	<div class="selects">
	<select id="allProductsLikesChartSelectDate"  class="form-select" aria-label="Default select example">
  <option value="7">Last 7 days</option>
  <option value="30">Last Month</option>
  <option value="180">Last 6 Months</option>
  <option value="365">Last Year</option>
  <option value="100000">All Times</option>

</select>
<select id="allProductsLikesChartSelectGenre"  class="form-select" aria-label="Default select example">
  <option value="All Genres">All Genres</option>
  <option value="male">Hommes</option>
  <option value="female">Females</option>

</select>

    </div>

	<canvas id="allProductsLikesChart">

           </canvas>

</div>
<div id="ProductsByCategorys" class="charts">
	
<canvas id="ProductsByCategorysChart">
</canvas>

</div>
</div>




	<script src="productsFilter.js"></script>


	
	
	</div>
	<!-- ************************************************************************ PRODUCTS CHARTS END *****************************************************************************************-->
<!-- ************************************************************************categorys CHARTS  *****************************************************************************************-->
<div id="categoryschart"> 
  <div id="stasContainer">

	     <div class="charts">
		 <center><div class="search">
		<label for="search">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input id="CategoryInput" class="searchInput" type="text" placeholder="Id or Title" id="search">
			</label>
		
		</div></center>
		<canvas id="CategorysCharts">
         </canvas>
         </div>


         <div  class="charts">
		   <div class="selects">
	      <select id="AllCategorysChartSelectDate"  class="form-select" aria-label="Default select example">
        <option value="7">Last 7 days</option>
          <option value="30">Last Month</option>
           <option value="180">Last 6 Months</option>
          <option value="365">Last Year</option>
                    <option value="100000">All Times</option>
             </select>
             <select id="AllCategorysChartSelectGenre"  class="form-select" aria-label="Default select example">
               <option value="All Genres">All Genres</option>
             <option value="male">Hommes</option>
           <option value="female">Females</option>

             </select>

              </div>
		 <canvas id="AllCategorysChart">
</canvas>

          </div>
 </div>

<br>

	  <!-- ***********************************************************8 -->

 <div id="stasContainer">

	     <div id="CategorysRadardiv" class="charts">
		 <div class="selects">
	<select id="CategorysRadarSelectDate"  class="form-select" aria-label="Default select example">
  <option value="7">Last 7 days</option>
  <option value="30">Last Month</option>
  <option value="180">Last 6 Months</option>
  <option value="365">Last Year</option>
  <option value="100000">All Times</option>

</select>
</div>
<center>
		
		<canvas id="CategorysRadar">
</canvas>
</center>

         </div>


         <div id="CategorysRadardiv"  class="charts">
			 <div class="selects">
	<select id="CategorysRadarLikeSelectDate"  class="form-select" aria-label="Default select example">
  <option value="7">Last 7 days</option>
  <option value="30">Last Month</option>
  <option value="180">Last 6 Months</option>
  <option value="365">Last Year</option>
  <option value="100000">All Times</option>

</select>

</div>
		
		 <center>
		
		<canvas id="CategorysRadarLike">
</canvas>
</center>
          </div>
		  
      </div>
	  <script src="categorysFilter.js"></script>

</div>
		<!-- ************************************************************************ categorys CHARTS END *****************************************************************************************-->
		<!-- ************************************************************************ users CHARTS  *****************************************************************************************-->

  <div id="userschart">
     <div id="stasContainer">
	       <div class="charts">
		   <center><div class="search">
		<label for="search">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input id="userInput" class="searchInput" type="text" placeholder="Id or Title" id="search">
			</label>
		
		</div></center>
		<canvas id="usersChart">
         </canvas>
           </div>


		  <div class="charts">
		  <div class="selects">
	<select id="AllusersChartSelectDate"  class="form-select" aria-label="Default select example">
  <option value="7">Last 7 days</option>
  <option value="30">Last Month</option>
  <option value="180">Last 6 Months</option>
  <option value="365">Last Year</option>
  <option value="100000">All Times</option>

</select>
<select id="AllusersChartSelectGenre"  class="form-select" aria-label="Default select example">
               <option value="All Genres">All Genres</option>
             <option value="male">Hommes</option>
           <option value="female">Females</option>

             </select>
</div>
		      <canvas id="AllusersChart"></canvas>
        </div>
      </div>
	  <script src="usersFilter.js"></script>

 </div>



 <!-- ***********************************88 notifications div ---------------------------------------------->

<div id="notificationsPopup" class="popup" ></div>



<div id="Noinfos"  ><div id="content">
	<center>
	<svg hieght="150" width="150" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#F38787" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polyline points="34.48 54.28 11.06 54.28 11.06 18.61 23.02 5.75 48.67 5.75 48.67 39.42"></polyline><polyline points="23.04 5.75 23.02 18.61 11.06 18.61"></polyline><line x1="16.21" y1="45.68" x2="28.22" y2="45.68"></line><line x1="16.21" y1="39.15" x2="31.22" y2="39.15"></line><line x1="16.21" y1="33.05" x2="43.22" y2="33.05"></line><line x1="16.21" y1="26.95" x2="43.22" y2="26.95"></line><circle cx="42.92" cy="48.24" r="10.01" stroke-linecap="round"></circle><line x1="39.05" y1="44.36" x2="46.8" y2="52.11"></line><line x1="39.05" y1="52.11" x2="46.8" y2="44.36"></line></g></svg>
<br>
There is no Informations About this id or title
</center>
</div>
</div>


	</main>
</div>




<script src="notification.js"></script>
<script src="handletd.js" ></script>



<div id="containerloading">
<div class="loader">
	<div class="loader-inner">
		<div class="loader-line-wrap">
			<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
			<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
			<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
			<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
			<div class="loader-line"></div>
		</div>
	</div>
</div>

</div>
</body>
</html>
