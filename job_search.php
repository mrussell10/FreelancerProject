<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<head>
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>jQuery.FilterTable Sample</title>
        <style>
            /* generic table styling */
            table { border-collapse: collapse; width:100%; }
            th, td { padding: 5px; }


            td { border-bottom: 1px solid #ccc; }

            /* filter-table specific styling */
            td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
        </style>
    </head>
    <body>
        <div class="col-md-9">


            <table>
                <thead>
                    <tr>
                        <th scope="col" title="President Number">#</th>
                        <th scope="col">President</th>
                        <th scope="col">Terms</th>
                        <th scope="col">Tenure</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>George Washington</td><td>two</td><td>1789-1797</td></tr>
                    <tr><td>2</td><td>John Adams</td><td>one</td><td>1797-1801</td></tr>
                    <tr><td>3</td><td>Thomas Jefferson</td><td>two</td><td>1801-1809</td></tr>
                    <tr><td>4</td><td>James Madison</td><td>two</td><td>1809-1817</td></tr>
                    <tr><td>5</td><td>James Monroe</td><td>two</td><td>1817-1825</td></tr>
                    <tr><td>6</td><td>John Quincy Adams</td><td>one</td><td>1825-1829</td></tr>
                    <tr><td>7</td><td>Andrew Jackson</td><td>two</td><td>1829-1837</td></tr>
                    <tr><td>8</td><td>Martin Van Buren</td><td>one</td><td>1837-1841</td></tr>
                    <tr><td>9</td><td>William Henry Harrison</td><td>one-partial</td><td>1841</td></tr>
                    <tr><td>10</td><td>John Tyler</td><td>one-partial</td><td>1841-1845</td></tr>
                    <tr><td>11</td><td>James Knox Polk</td><td>one</td><td>1845-1849</td></tr>
                    <tr><td>12</td><td>Zachary Taylor</td><td>one-partial</td><td>1849-1850</td></tr>
                    <tr><td>13</td><td>Millard Fillmore</td><td>one-partial</td><td>1850-1853</td></tr>
                    <tr><td>14</td><td>Franklin Pierce</td><td>one</td><td>1853-1857</td></tr>
                    <tr><td>15</td><td>James Buchanan</td><td>one</td><td>1857-1861</td></tr>
                    <tr><td>16</td><td>Abraham Lincoln</td><td>two-partial</td><td>1861-1865</td></tr>
                    <tr><td>17</td><td>Andrew Johnson</td><td>one-partial</td><td>1865-1869</td></tr>
                    <tr><td>18</td><td>Ulysses S. Grant</td><td>two</td><td>1869-1877</td></tr>
                    <tr><td>19</td><td>Rutherford Birchard Hayes</td><td>one</td><td>1877-1881</td></tr>
                    <tr><td>20</td><td>James Abram Garfield</td><td>one-partial</td><td>1881</td></tr>
                    <tr><td>21</td><td>Chester Alan Arthur</td><td>one-partial</td><td>1881-1885</td></tr>
                    <tr><td>22</td><td>Grover Cleveland</td><td>one</td><td>1885-1889</td></tr>
                    <tr><td>23</td><td>Benjamin Harrison</td><td>one</td><td>1889-1893</td></tr>
                    <tr><td>24</td><td>Grover Cleveland</td><td>one-again</td><td>1893-1897</td></tr>
                    <tr><td>25</td><td>William McKinley</td><td>two-partial</td><td>1897-1901</td></tr>
                    <tr><td>26</td><td>Theodore Roosevelt</td><td>two-partial</td><td>1901-1909</td></tr>
                    <tr><td>27</td><td>William Howard Taft</td><td>one</td><td>1909-1913</td></tr>
                    <tr><td>28</td><td>Woodrow Wilson</td><td>two</td><td>1913-1921</td></tr>
                    <tr><td>29</td><td>Warren Gamaliel Harding</td><td>two-partial</td><td>1921-1923</td></tr>
                    <tr><td>30</td><td>Calvin Coolidge</td><td>two-partial</td><td>1923-1929</td></tr>
                    <tr><td>31</td><td>Herbert Clark Hoover</td><td>one</td><td>1929-1933</td></tr>
                    <tr><td>32</td><td>Franklin Delano Roosevelt</td><td>four-partial</td><td>1933-1945</td></tr>
                    <tr><td>33</td><td>Harry S. Truman</td><td>two-partial</td><td>1945-1953</td></tr>
                    <tr><td>34</td><td>Dwight David Eisenhower</td><td>two</td><td>1953-1961</td></tr>
                    <tr><td>35</td><td>John Fitzgerald Kennedy</td><td>two-partial</td><td>1961-1963</td></tr>
                    <tr><td>36</td><td>Lyndon Baines Johnson</td><td>two-partial</td><td>1963-1969</td></tr>
                    <tr><td>37</td><td>Richard Milhous Nixon</td><td>two-partial</td><td>1969-1974</td></tr>
                    <tr><td>38</td><td>Gerald Rudolph Ford</td><td>two-partial</td><td>1974-1977</td></tr>
                    <tr><td>39</td><td>James Earl Carter, Jr.</td><td>one</td><td>1977-1981</td></tr>
                    <tr><td>40</td><td>Ronald Wilson Reagan</td><td>two</td><td>1981-1989</td></tr>
                    <tr><td>41</td><td>George Herbert Walker Bush</td><td>one</td><td>1989-1993</td></tr>
                    <tr><td>42</td><td>William Jefferson Clinton</td><td>two</td><td>1993-2001</td></tr>
                    <tr><td>43</td><td>George Walker Bush</td><td>two</td><td>2001-2009</td></tr>
                    <tr><td>44</td><td>Barack Hussein Obama</td><td>one</td><td>2009-</td></tr>
                </tbody>
            </table>
            <p><em>Data as of October, 2012.</em></p>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="css/bootstrap/js/jquery.filtertable.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('table').filterTable();
                });
            </script>
    </body>
</html>
<!-- Placed at the end of the document so the pages load faster -->
