package util;

import android.app.Activity;
import android.util.Log;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.concurrent.TimeUnit;

import okhttp3.Call;
import okhttp3.FormBody;
import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

/**
 * Created by Rajesh Dabhi on 28/6/2017.
 */

public class JSONParser {

    Activity activity;

    public JSONParser(Activity act) {
        activity = act;
    }

    public String execPostScriptJSON(String url, ArrayList<NameValuePair> valuePairs)
            throws IOException {
        String responce = null;
        if (ConnectivityReceiver.isConnected()) {

            OkHttpClient client = new OkHttpClient();
            //increased timeout for slow response
            OkHttpClient eagerClient = client.newBuilder()
                    .readTimeout(30, TimeUnit.SECONDS)
                    .build();
            Log.i("PARAMETERS", "PARAMETERS ::" + valuePairs);

            FormBody.Builder builder = new FormBody.Builder();

            for (NameValuePair valuePair : valuePairs) {
                String val = "";

                val = valuePair.value;

                builder.add(valuePair.name, val);

            }

            Request request = new Request.Builder()

                    .url(url)
                    .addHeader("Authorization", "passme")
                    .post(builder.build()).build();
            Log.i("Registration Request::", request.toString());

            Response response = eagerClient.newCall(request).execute();
            Log.i("REGISTRATION RESPONSE::", response.toString());
            responce = response.body().string();


            //res = res.replace("%20"," ");
        } else {
            responce = "{responce : false, error : 'No internet connection'}";
            //Toast.makeText(activity,activity.getString(R.string.no_internet_connection),Toast.LENGTH_SHORT).show();
        }
        return responce;
    }

    public String execMultiPartPostScriptJSON(String url, ArrayList<NameValuePair> valuePairs, String MEDIA_TYPE_PNG, String filepath, String imagename)
            throws IOException {
        String responce = null;
        if (ConnectivityReceiver.isConnected()) {

            OkHttpClient client = new OkHttpClient();
            //increased timeout for slow response
            OkHttpClient eagerClient = client.newBuilder()
                    .readTimeout(30, TimeUnit.SECONDS)
                    .build();
            Log.i("PARAMETERS", "PARAMETERS ::" + valuePairs);

            MultipartBody.Builder builder = new MultipartBody.Builder()
                    .setType(MultipartBody.FORM);
            if (filepath != null && !filepath.equalsIgnoreCase("")) {
                File fileupload = new File(filepath);
                if (fileupload != null) {
                    builder.addFormDataPart(imagename, "logo-square.png",
                            RequestBody.create(MediaType.parse(MEDIA_TYPE_PNG), fileupload))
                    ;

                }
            }
            for (NameValuePair valuePair : valuePairs) {
                String val = "";

                val = valuePair.value;

                builder.addFormDataPart(valuePair.name, val);

            }

            RequestBody requestBody = builder.build();

            Request request = new Request.Builder().url(url).post(requestBody).build();
            Log.i("Registration Request::", request.toString());

            Response response = eagerClient.newCall(request).execute();
            Log.i("REGISTRATION RESPONSE::", response.toString());
            responce = response.body().string();


            //res = res.replace("%20"," ");
        } else {
            //Snackbar.make(null, "Replace with your own action", Snackbar.LENGTH_LONG)
            //		.setAction("Action", null).show();
        }
        return responce;
    }

    public String exeGetRequest(String url, String params) throws IOException {
        String result = "";

        OkHttpClient client = new OkHttpClient();
        //increased timeout for slow response
        OkHttpClient eagerClient = client.newBuilder()
                .readTimeout(30, TimeUnit.SECONDS)
                .build();

        String my_url = url + "?" + params;
        Request request = new Request.Builder()
                .url(my_url)
                .build();

        Call call = client.newCall(request);
        Response response = eagerClient.newCall(request).execute();
        ;
        result = response.body().string();
        return result;
    }
}
