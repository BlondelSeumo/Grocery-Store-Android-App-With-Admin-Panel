package Model;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

/**
 * Created by Rajesh Dabhi on 24/6/2017.
 */

public class Category_model {

    String id;
    String title;
    String slug;
    String parent;
    String leval;
    String description;
    String image;
    String status;


    String Count;
    String PCount;

    @SerializedName("sub_cat")
    ArrayList<Category_subcat_model> category_sub_datas;

    public String getId(){
        return id;
    }

    public String getTitle(){
        return title;
    }

    public void setTitle(String title){
        this.title = title;
    }

    public String getSlug(){
        return slug;
    }

    public String getParent(){
        return parent;
    }

    public String getLeval(){
        return leval;
    }

    public String getDescription(){
        return description;
    }

    public String getImage(){
        return image;
    }

    public void setImage(String image){
        this.image = image;
    }

    public String getStatus(){
        return status;
    }




    public String getCount(){
        return Count;
    }

    public String getPCount(){
        return PCount;
    }

    public ArrayList<Category_subcat_model> getCategory_sub_datas(){
        return category_sub_datas;
    }

}
