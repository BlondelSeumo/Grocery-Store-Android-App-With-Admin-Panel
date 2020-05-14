package Model;

/**
 * Created by Rajesh Dabhi on 29/6/2017.
 */

public class My_order_model {

    String sale_id;
    String user_id;
    String on_date;
    String delivery_time_from;
    String delivery_time_to;
    String status;
    String note;
    String is_paid;
    String total_amount;
    String total_kg;
    String total_items;
    String socity_id;
    String delivery_address;
    String location_id;
    String delivery_charge;

    public String getSale_id(){
        return sale_id;
    }

    public String getUser_id(){
        return user_id;
    }

    public String getOn_date(){
        return on_date;
    }

    public String getDelivery_time_from(){
        return delivery_time_from;
    }

    public String getDelivery_time_to(){
        return delivery_time_to;
    }

    public String getStatus(){
        return status;
    }

    public String getNote(){
        return note;
    }

    public String getIs_paid(){
        return is_paid;
    }

    public String getTotal_amount(){
        return total_amount;
    }

    public String getTotal_kg(){
        return total_kg;
    }

    public String getTotal_items(){
        return total_items;
    }

    public String getSocity_id(){
        return socity_id;
    }

    public String getDelivery_address(){
        return delivery_address;
    }

    public String getLocation_id(){
        return location_id;
    }

    public String getDelivery_charge(){
        return delivery_charge;
    }

}
