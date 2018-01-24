<?php

    function getRows(){
        global $con;
        global $categories; // the filter from filterController
        global $offset; //amount to offset
        global $sort; // sort by from sortController
        global $page; // current page from offsetController
        $numPerPage = 4;
        $sortArray = ["s.name ASC", "s.name DESC", "s.price ASC", "s.price DESC"];
        $numOfPages;

        $placeHolder = [];  // a array that will store all values to bind
        if(empty($categories)){ 
            $categories = []; // we can always merge it even if it's empty
        } 
        if(empty($offset)){ 
            $offset = 0; // initially offset by 0
        } 
        
        try{
            // get how many seforim there are to only display up to that amount
            $count = "SELECT COUNT(id) AS totalPages FROM seforim";
            $prepare = $con->prepare($count);
            $prepare -> execute();
            $getCount = $prepare -> fetch(PDO::FETCH_COLUMN);
           
                if($offset >= $getCount){ // if offset = the amount of seforim, reset to the begining
                    $offset = 0;
                    $page = 0;
                }
            }catch(PDOException $e){
                die("Something went wrong " . $e->getMessage());
            }

        try{
            $query = "SELECT s.id, s.name AS sefer_name, s.price, s.category, s.units_in_stock, c.name AS cat_name
                 FROM seforim s  JOIN categories c ON s.category = c.id";
            if(!empty($categories)){ 
                $qmArray = array_fill(0, count($categories), '?'); //set number of '?'to the amount of catagories
                $qm = implode(",", $qmArray); // turn ?array int a string
                $query .= "  WHERE c.id IN ($qm)"; // only display the choosen catagories
            }
            $query .= " ORDER BY ";  
            if(in_array($sort, $sortArray)){
                $query .=  $sort; // if the sort by matches a item in the sort array
            }
            else{
                $query .= "s.name ASC"; //default sort by ASC
            }
            $query .= " LIMIT ?, $numPerPage";
            $placeHolder[] = $offset; // add $offset to the array so that it can later be merged
            $statement = $con->prepare($query);
            $queryArray = array_merge($categories, $placeHolder); // a new array with all values to bind
            foreach($queryArray as $key => $value){
                //loop through the array and get key(number +1 because it's 0 based) and the value
                //to bind the key to the value
                $statement->bindvalue($key+1,(int)$value, PDO::PARAM_INT);
            }
            $execute = $statement -> execute();
            $seforimOption = $statement -> fetchAll(PDO::FETCH_ASSOC);
           
           
        }catch(PDOException $e){
            die("Something went wrong " . $e->getMessage());
        }
        return $seforimOption;
    }
    
    function getSeforimInfo($id){
        $equel = false;
        $returnString = "";
        foreach(getRows() as $seferInfo){
                if($seferInfo['id'] == $id){
                    $returnString .= " " . $seferInfo['sefer_name'] . " Price: $" . number_format($seferInfo['price'], 2);
                    $equel = true;
                }
            }
        if(!$equel){
            die("Please enter a valid sefer");
        }
        return $returnString;
    }
    
    // returns a string that gets all values of a selected sefer seperated by a |
    // to pass it along
    function valueString(array $props){
        foreach($props as $key=>$value){
            $explode[] = $key . "=" . $value; 
        }
        $retString = implode('|', $explode);
        return $retString;
    }
?>