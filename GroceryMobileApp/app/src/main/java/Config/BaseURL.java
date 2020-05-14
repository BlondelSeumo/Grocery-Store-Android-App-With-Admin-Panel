package Config;

/**
 * Created by Rajesh Dabhi on 22/6/2017.
 */

public class BaseURL {

    public static final String PREFS_NAME = "GroceryLoginPrefs";

    public static final String PREFS_NAME2 = "GroceryLoginPrefs2";

    public static final String IS_LOGIN = "isLogin";

    public static final String KEY_NAME = "user_fullname";

    public static final String KEY_EMAIL = "user_email";

    public static final String KEY_ID = "user_id";

    public static final String KEY_MOBILE = "user_phone";

    public static final String KEY_IMAGE = "user_image";

    public static final String KEY_PINCODE = "pincode";

    public static final String KEY_SOCITY_ID = "Socity_id";

    public static final String KEY_SOCITY_NAME = "socity_name";

    public static final String KEY_HOUSE = "house_no";

    public static final String KEY_DATE = "date";

    public static final String KEY_TIME = "time";

    public static final String KEY_PASSWORD = "password";


    //public static String BASE_URL = "http://iclauncher.com/grocery/";
    public static String BASE_URL = "http://shreehariweb.com/grocery/";

    // public static String BASE_URL = "http://192.168.123.101/grocery/";

    public static String IMG_SLIDER_URL = BASE_URL + "uploads/sliders/";

    public static String IMG_CATEGORY_URL = BASE_URL + "uploads/category/";

    public static String IMG_PRODUCT_URL = BASE_URL + "uploads/products/";

    public static String IMG_PROFILE_URL = BASE_URL + "uploads/profile/";


    public static String GET_SLIDER_URL = BASE_URL + "index.php/api/get_sliders";

    public static String GET_CATEGORY_URL = BASE_URL + "index.php/api/get_categories";

    public static String GET_PRODUCT_URL = BASE_URL + "index.php/api/get_products";

    public static String GET_ABOUT_URL = BASE_URL + "index.php/api/aboutus";

    public static String GET_SUPPORT_URL = BASE_URL + "index.php/api/support";

    public static String GET_TERMS_URL = BASE_URL + "index.php/api/terms";

    public static String GET_TIME_SLOT_URL = BASE_URL + "index.php/api/get_time_slot";

    public static String LOGIN_URL = BASE_URL + "index.php/api/login";

    public static String REGISTER_URL = BASE_URL + "index.php/api/signup";

    public static String GET_SOCITY_URL = BASE_URL + "index.php/api/get_society";

    public static String EDIT_PROFILE_URL = BASE_URL + "index.php/api/update_userdata";

    public static String ADD_ORDER_URL = BASE_URL + "index.php/api/send_order";

    public static String GET_ORDER_URL = BASE_URL + "index.php/api/my_orders";

    public static String ORDER_DETAIL_URL = BASE_URL + "index.php/api/order_details";

    public static String DELETE_ORDER_URL = BASE_URL + "index.php/api/cancel_order";

    public static String GET_LIMITE_SETTING_URL = BASE_URL + "index.php/api/get_limit_settings";

    public static String ADD_ADDRESS_URL = BASE_URL + "index.php/api/add_address";

    public static String GET_ADDRESS_URL = BASE_URL + "index.php/api/get_address";

    public static String FORGOT_URL = BASE_URL + "index.php/api/forgot_password";

    public static String JSON_RIGISTER_FCM = BASE_URL + "index.php/api/register_fcm";

    public static String CHANGE_PASSWORD_URL = BASE_URL + "index.php/api/change_password";

    public static String DELETE_ADDRESS_URL = BASE_URL + "index.php/api/delete_address";

    public static String EDIT_ADDRESS_URL = BASE_URL + "index.php/api/edit_address";


    // global topic to receive app wide push notifications

    // broadcast receiver intent filters
    public static final String REGISTRATION_COMPLETE = "registrationComplete";

    public static final String PUSH_NOTIFICATION = "pushNotification";

}
