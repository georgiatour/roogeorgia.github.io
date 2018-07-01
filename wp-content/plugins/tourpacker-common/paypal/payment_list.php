<?php
defined('TEXT_DOMAIN_PAPAL_LIST') or define('TEXT_DOMAIN_PAPAL_LIST', 'tourpacker');

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Paypal_List_Table extends WP_List_Table {

    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'registration',     //singular name of the listed records
            'plural'    => 'registrations',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );
        
    }

    function column_default($item, $column_name){
        switch($column_name){
            case 'id':
            case 'buyer_name':
            case 'departure_date':
            case 'start_in':
            case 'end_in':
            case 'price':
            case 'currency':
            case 'status':            
            case 'order_id':
            case 'transaction_id':            
           
            case 'created':
                return $item[$column_name];
            default:
                return print_r($item,true); //Show the whole array for troubleshooting purposes
        }
    }

    function column_id($item){
        
        //Build row actions
        $actions = array(            
            'delete'    => sprintf('<a href="?page=%s&action=%s&registration=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id']),
        );
        
        //Return the title contents
        return sprintf('<span>%1$s</span>%2$s',
            $item['id'],
            $this->row_actions($actions)
        );
    }

    function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['id']                //The value of the checkbox should be the record's id
        );
    }

    function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'id'   => 'ID',
            'buyer_name'   => 'Buyer Name',
            'departure_date'   => 'Departure Date',
            'start_in'   => 'Start in',
            'end_in'   => 'End in',
            'price'         => 'Price',
            'currency'      => 'Currency',
            'status'        => 'Status',            
            'order_id'      => 'Order id',
            'transaction_id'=> 'Transaction id',            
            
            'created'       =>'Date',
        );
        return $columns;
    }

    function get_sortable_columns() {
        $sortable_columns = array(
            'id'     => array('id',true),
            'buyer_name'     => array('buyer_name',false),     //true means it's already sorted
            'departure_date'    => array('departure_date',false),
            'start_in'    => array('start_in',false),
            'end_in'    => array('end_in',false),
            'price'    => array('price',false),
            'currency'  => array('currency',false),
            'status'  => array('status',false),            
            'order_id'  => array('order_id',false),
            'transaction_id'  => array('transaction_id',false),            
            
            'created'  => array('created',false),
        );
        return $sortable_columns;
    }


    function get_bulk_actions() {
        $actions = array(
            'delete'    => 'Delete'
        );
        return $actions;
    }

    function process_bulk_action() {
        global $wpdb;
        //Detect when a bulk action is being triggered...
        if(isset($_REQUEST['registration'])){
            if(is_array($_REQUEST['registration'])){
                $ids = implode(',',$_REQUEST['registration']);  
            }else{
                $ids = $_REQUEST['registration'];
            }
        }        
        
        //var_dump($ids);exit();
        if( 'delete'===$this->current_action() ) {          
            $wpdb->query("DELETE FROM tour_payments WHERE id IN (".$ids.")");            
            _e('The Items deleted!', 'tourpacker');
        }
        
    }

    function prepare_items() {
        global $wpdb; //This is used only if making any database queries

        /**
         * First, lets decide how many records per page to show
         */
        $per_page = 20;
        
        
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
        
        $this->process_bulk_action();

        $data = array();
        $result = $wpdb->get_results( "SELECT * FROM tour_payments where status = 'Completed' ORDER BY id ASC ");        
        foreach($result as $r) {
            $data[] = array(
                'id'            => $r->id,
                'buyer_name'        => $r->buyer_name,
                'departure_date'      => $r->departure_date,
                'start_in'      => $r->start_in,
                'end_in'      => $r->end_in,
                'price'      => $r->price,
                'currency'      => $r->currency,
                'status'      => $r->status,                
                'order_id'      => $r->order_id,
                'transaction_id'      => $r->transaction_id,                
                
                'created'       => date(get_option('date_format'), $r->created)
            );
        }

       

       
        function usort_reorder($a,$b){
            $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'id'; //If no sort, default to title
            $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc'; //If no order, default to asc
            $result = strcmp($a[$orderby], $b[$orderby]); //Determine sort order
            return ($order==='asc') ? $result : -$result; //Send final sort direction to usort
        }
        usort($data, 'usort_reorder');
        
        $current_page = $this->get_pagenum();
        
        $total_items = count($data);
        
        
       
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
       
        $this->items = $data;
        
       
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }

}





/** ************************ REGISTER THE TEST PAGE ****************************
 *******************************************************************************
 * Now we just need to define an admin page. For this example, we'll add a top-level
 * menu item to the bottom of the admin menus.
 */
function tt_add_menu_items(){
    //add_menu_page('Example Plugin List Table', 'List Table Example', 'activate_plugins', 'tt_list_test', 'tt_render_list_page');
    //add_theme_page( __( 'Free Register List', TEXT_DOMAIN_PAPAL_LIST ), __( 'Free Register List', TEXT_DOMAIN_PAPAL_LIST ), 'manage_options', 'free_register', 'tt_render_list_page_free');
    add_theme_page( __( 'Paypal Order List', TEXT_DOMAIN_PAPAL_LIST ), __( 'Paypal Order List', TEXT_DOMAIN_PAPAL_LIST ), 'manage_options', 'paypal_register', 'tt_render_list_page_paypal');
} 
add_action('admin_menu', 'tt_add_menu_items');





/** *************************** RENDER TEST PAGE ********************************
 *******************************************************************************/




function tt_render_list_page_paypal(){
    
    //Create an instance of our package class...
    $testListTablepaypal = new Paypal_List_Table();
    //Fetch, prepare, sort, and filter our data...
    $testListTablepaypal->prepare_items();
    
    ?>
    <div class="wrap">        
        <div id="icon-users" class="icon32"><br/></div>
        <h2><?php _e('Paypal Order List', TEXT_DOMAIN_PAPAL_LIST) ?></h2>
        <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
        <form id="movies-filter" method="get">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <!-- Now we can render the completed list table -->
            <?php $testListTablepaypal->display() ?>
        </form>
        
    </div>
    <?php
}