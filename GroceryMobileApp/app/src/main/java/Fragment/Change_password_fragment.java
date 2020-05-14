package Fragment;

import android.app.Fragment;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.NoConnectionError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.TimeoutError;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import Config.BaseURL;
import codecanyon.grocery.AppController;
import codecanyon.grocery.LoginActivity;
import codecanyon.grocery.MainActivity;
import codecanyon.grocery.R;
import util.ConnectivityReceiver;
import util.CustomVolleyJsonRequest;
import util.Session_management;

/**
 * Created by Rajesh Dabhi on 13/7/2017.
 */

public class Change_password_fragment extends Fragment {

    private static String TAG = Change_password_fragment.class.getSimpleName();

    private TextView tv_new_pass, tv_old_pass, tv_con_pass;
    private EditText et_new_pass, et_old_pass, et_con_pass;
    private Button btn_change_pass;

    private Session_management sessionManagement;

    public Change_password_fragment() {
        // Required empty public constructor
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_change_password, container, false);
        setHasOptionsMenu(true);

        ((MainActivity) getActivity()).setTitle(getResources().getString(R.string.change_password));

        sessionManagement = new Session_management(getActivity());

        tv_new_pass = (TextView) view.findViewById(R.id.tv_change_new_password);
        tv_old_pass = (TextView) view.findViewById(R.id.tv_change_old_password);
        tv_con_pass = (TextView) view.findViewById(R.id.tv_change_con_password);
        et_new_pass = (EditText) view.findViewById(R.id.et_change_new_password);
        et_old_pass = (EditText) view.findViewById(R.id.et_change_old_password);
        et_con_pass = (EditText) view.findViewById(R.id.et_change_con_password);
        btn_change_pass = (Button) view.findViewById(R.id.btn_change_password);

        btn_change_pass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                attemptChangePassword();
            }
        });

        return view;
    }

    private void attemptChangePassword() {

        tv_new_pass.setText(getResources().getString(R.string.new_password));
        tv_old_pass.setText(getResources().getString(R.string.old_password));
        tv_con_pass.setText(getResources().getString(R.string.confirm_password));

        tv_new_pass.setTextColor(getResources().getColor(R.color.dark_gray));
        tv_old_pass.setTextColor(getResources().getColor(R.color.dark_gray));
        tv_con_pass.setTextColor(getResources().getColor(R.color.dark_gray));

        String get_new_pass = et_new_pass.getText().toString();
        String get_old_pass = et_old_pass.getText().toString();
        String get_con_pass = et_con_pass.getText().toString();

        boolean cancel = false;
        View focusView = null;

        if (TextUtils.isEmpty(get_new_pass)) {
            tv_new_pass.setTextColor(getResources().getColor(R.color.colorPrimary));
            focusView = tv_new_pass;
            cancel = true;
        } else if (!isPasswordValid(get_new_pass)) {
            tv_new_pass.setText(getString(R.string.password_too_short));
            tv_new_pass.setTextColor(getResources().getColor(R.color.colorPrimary));
            focusView = tv_new_pass;
            cancel = true;
        }

        if (TextUtils.isEmpty(get_old_pass)) {
            tv_old_pass.setTextColor(getResources().getColor(R.color.colorPrimary));
            focusView = tv_old_pass;
            cancel = true;
        } else if (!isPasswordValid(get_old_pass)) {
            tv_old_pass.setText(getString(R.string.password_too_short));
            tv_old_pass.setTextColor(getResources().getColor(R.color.colorPrimary));
            focusView = tv_old_pass;
            cancel = true;
        }

        if (TextUtils.isEmpty(get_con_pass)) {
            tv_con_pass.setTextColor(getResources().getColor(R.color.colorPrimary));
            focusView = tv_con_pass;
            cancel = true;
        } else if (!get_con_pass.equals(get_new_pass)) {
            tv_con_pass.setTextColor(getResources().getColor(R.color.colorPrimary));
            tv_con_pass.setText(getResources().getString(R.string.password_not_same));
            focusView = tv_con_pass;
            cancel = true;
        }

        if (cancel) {
            // There was an error; don't attempt login and focus the first
            // form field with an error.
            if (focusView != null)
                focusView.requestFocus();
        } else {
            // Show a progress spinner, and kick off a background task to
            // perform the user login attempt.

            if (ConnectivityReceiver.isConnected()) {

                String user_id = sessionManagement.getUserDetails().get(BaseURL.KEY_ID);

                // check internet connection
                if (ConnectivityReceiver.isConnected()) {
                    makeChangePasswordRequest(user_id, get_new_pass, get_old_pass);
                }
            }
        }
    }

    private boolean isPasswordValid(String password) {
        //TODO: Replace this with your own logic
        return password.length() > 4;
    }

    /**
     * Method to make json object request where json response starts wtih
     */
    private void makeChangePasswordRequest(String user_id, String new_password,
                                           String current_password) {

        // Tag used to cancel the request
        String tag_json_obj = "json_change_password_req";

        Map<String, String> params = new HashMap<String, String>();
        params.put("user_id", user_id);
        params.put("new_password", new_password);
        params.put("current_password", current_password);

        CustomVolleyJsonRequest jsonObjReq = new CustomVolleyJsonRequest(Request.Method.POST,
                BaseURL.CHANGE_PASSWORD_URL, params, new Response.Listener<JSONObject>() {

            @Override
            public void onResponse(JSONObject response) {
                Log.d(TAG, response.toString());

                try {
                    Boolean status = response.getBoolean("responce");
                    if (status) {

                        Toast.makeText(getActivity(), "Password Change Sucessfully", Toast.LENGTH_SHORT).show();

                        sessionManagement.logoutSessionwithchangepassword();
                        ((MainActivity) getActivity()).setFinish();

                    } else {
                        Toast.makeText(getActivity(), "'Current password do not match", Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.d(TAG, "Error: " + error.getMessage());
                if (error instanceof TimeoutError || error instanceof NoConnectionError) {
                    Toast.makeText(getActivity(), getResources().getString(R.string.connection_time_out), Toast.LENGTH_SHORT).show();
                }
            }
        });

        // Adding request to request queue
        AppController.getInstance().addToRequestQueue(jsonObjReq, tag_json_obj);
    }

    @Override
    public void onCreateOptionsMenu(Menu menu, MenuInflater inflater) {
        // TODO Add your menu entries here
        super.onCreateOptionsMenu(menu, inflater);

        MenuItem cart = menu.findItem(R.id.action_cart);
        cart.setVisible(false);
        MenuItem change_pass = menu.findItem(R.id.action_change_password);
        change_pass.setVisible(false);
        MenuItem search = menu.findItem(R.id.action_search);
        search.setVisible(false);

    }

}
