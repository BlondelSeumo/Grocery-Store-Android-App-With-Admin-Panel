package Model;

/**
 * Created by Rajesh Dabhi on 6/7/2017.
 */

public class Delivery_address_model {

    String location_id;
    String user_id;
    String socity_id;
    String house_no;
    String receiver_name;
    String receiver_mobile;
    String socity_name;
    String pincode;

    String delivery_charge;
    boolean ischeckd;

    public String getLocation_id(){
        return location_id;
    }

    public String getUser_id(){
        return user_id;
    }

    public String getSocity_id(){
        return socity_id;
    }

    public String getHouse_no(){
        return house_no;
    }

    public String getReceiver_name(){
        return receiver_name;
    }

    public String getReceiver_mobile(){
        return receiver_mobile;
    }

    public String getSocity_name(){
        return socity_name;
    }

    public String getPincode(){
        return pincode;
    }



    public String getDelivery_charge(){
        return delivery_charge;
    }

    public boolean getIscheckd(){
        return ischeckd;
    }

    public void setIscheckd(boolean ischeckd){
        this.ischeckd = ischeckd;
    }

}
