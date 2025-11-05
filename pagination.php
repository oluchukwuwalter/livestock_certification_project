<?php
	class pagination{
		
		function totalPager($numrows, $rowsperpage){
			// find out total pages
			$this->totalpage = ceil($numrows / $rowsperpage);
			return $this;
		}
		
		
		function currentPage($curPage){// get the current page or set a default
			//$curPage = $_GET['currentpage']
			if (isset($curPage) && is_numeric($curPage)) {
				   // cast var as int
				$this->currentpage = (int) $curPage;
			} else {
				// default page num
				$this->currentpage = 1;
			} // end if
			return $this;
		}
		
		function currentPageCheck($currentpagee, $totalpagee){
			// if current page is greater than total pages...
			if ($currentpagee > $totalpagee) {
			   // set current page to last page
			   $currentpagee = $totalpagee;
			} // end if
			// if current page is less than first page...
			if ($currentpagee < 1) {
			   // set current page to first page
			   $currentpagee = 1;
			} // end if
			
			return $currentpagee;
		}
		
		function offsetIt($currentpage, $rowsperpage){
			
			// the offset of the list, based on current page 
			$this->offset = ($currentpage - 1) * $rowsperpage;
			return $this;
		}
		
		function prevLinks($pager, $currentpage, $check, $option){
			//$page = $_SERVER['PHP_SELF']
			// if not on page 1, don't show back links
			if ($currentpage > 1) {
			   // show << link to go back to page 1
			   echo " <a href='$pager?currentpage=1&&check=$check&&option=$option'><<</a> ";
			   // get previous page num
			   $prevpage = $currentpage - 1;
			   // show < link to go back to 1 page
			   echo " <a href='$pager?currentpage=$prevpage&&check=$check&&option=$option'><</a> ";
			} // end if 
		}
		
		
		function loopLinks($currentpage, $range, $totalpages, $pager, $check, $option){
			
			// loop to show links to range of pages around current page
			for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
			   // if it's a valid page number...
			   if (($x > 0) && ($x <= $totalpages)) {
				  // if we're on current page...
				  if ($x == $currentpage) {
					 // 'highlight' it but don't make a link
					 echo " [<b>$x</b>] ";
				  // if not current page...
				  } else {
					 // make it a link
					 echo " <a href='$pager?currentpage=$x&&check=$check&&option=$option'>$x</a> ";
				  } // end else
			   } // end if 
			} // end for
		}
		
		
		function nextLinks($currentpage, $totalpages, $pager, $check, $option){
			
			// if not on last page, show forward and last page links        
			if ($currentpage != $totalpages) {
			   // get next page
			   $nextpage = $currentpage + 1;
				// echo forward link for next page 
			   echo " <a href='$pager?currentpage=$nextpage&&check=$check&&option=$option'>></a> ";
			   // echo forward link for lastpage
			   echo " <a href='$pager?currentpage=$totalpages&&check=$check&&option=$option'>>></a> ";
			} // end if
		}
		
		
	}



?>