package Adapter;

import android.app.Activity;
import android.app.Fragment;
import android.app.FragmentManager;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.NoConnectionError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.TimeoutError;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.daimajia.swipe.SimpleSwipeListener;
import com.daimajia.swipe.SwipeLayout;
import com.daimajia.swipe.adapters.RecyclerSwipeAdapter;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import Config.BaseURL;
import Fragment.Add_delivery_address_fragment;
import Model.Delivery_address_model;
import codecanyon.grocery.AppController;
import codecanyon.grocery.R;
import util.ConnectivityReceiver;
import util.CustomVolleyJsonRequest;
import util.Session_management;

/**
 * Created by Rajesh on 2017-08-01.
 */

public class Delivery_get_address_adapter extends RecyclerSwipeAdapter<Delivery_get_address_adapter.MyViewHolder> {

    private static String TAG = Delivery_get_address_adapter.class.getSimpleName();

    private List<Delivery_address_model> modelList;

    private Context context;

    private static RadioButton lastChecked = null;
    private static int lastCheckedPos = 0;
    private boolean ischecked = false;
    private String location_id = "";
    private String getsocity, gethouse, getphone, getpin, getname, getcharge;

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView tv_address, tv_name, tv_phone, tv_charges;
        public RadioButton rb_select;

        SwipeLayout swipeLayout;
        Button buttonDelete, btn_edit;

        public MyViewHolder(View view) {
            super(view);

            swipeLayout = (SwipeLayout) itemView.findViewById(R.id.swipe);
            buttonDelete = (Button) itemView.findViewById(R.id.delete);
            btn_edit = (Button) itemView.findViewById(R.id.edit);

            tv_address = (TextView) view.findViewById(R.id.tv_adres_address);
            tv_name = (TextView) view.findViewById(R.id.tv_adres_username);
            tv_phone = (TextView) view.findViewById(R.id.tv_adres_phone);
            tv_charges = (TextView) view.findViewById(R.id.tv_adres_charge);
            rb_select = (RadioButton) view.findViewById(R.id.rb_adres);

            rb_select.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                    RadioButton cb = (RadioButton) view;
                    int clickedPos = getAdapterPosition();

                    location_id = modelList.get(clickedPos).getLocation_id();

                    gethouse = modelList.get(clickedPos).getHouse_no();
                    getname = modelList.get(clickedPos).getReceiver_name();
                    getphone = modelList.get(clickedPos).getReceiver_mobile();
                    getsocity = modelList.get(clickedPos).getSocity_name();
                    getpin = modelList.get(clickedPos).getPincode();
                    getcharge = modelList.get(clickedPos).getDelivery_charge();

                    if (modelList.size() > 1) {
                        if (cb.isChecked()) {
                            if (lastChecked != null) {
                                lastChecked.setChecked(false);
                                modelList.get(lastCheckedPos).setIscheckd(false);
                            }

                            lastChecked = cb;
                            lastCheckedPos = clickedPos;
                        } else {
                            lastChecked = null;
                        }
                    }
                    modelList.get(clickedPos).setIscheckd(cb.isChecked());

                    if (cb.isChecked()) {
                        ischecked = true;

                        Intent updates = new Intent("Grocery_delivery_charge");
                        updates.putExtra("type", "update");
                        updates.putExtra("charge", getcharge);
                        context.sendBroadcast(updates);
                    } else {
                        ischecked = false;

                        Intent updates = new Intent("Grocery_delivery_charge");
                        updates.putExtra("type", "update");
                        updates.putExtra("charge", "00");
                        context.sendBroadcast(updates);
                    }

                }
            });
        }
    }

    public Delivery_get_address_adapter(List<Delivery_address_model> modelList) {
        this.modelList = modelList;
    }

    @Override
    public Delivery_get_address_adapter.MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.row_delivery_time_rv_test, parent, false);

        context = parent.getContext();

        return new Delivery_get_address_adapter.MyViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(final Delivery_get_address_adapter.MyViewHolder holder, final int position) {
        final Delivery_address_model mList = modelList.get(position);

        holder.tv_address.setText(mList.getSocity_name());
        holder.tv_phone.setText(mList.getReceiver_mobile());
        holder.tv_name.setText(mList.getReceiver_name());
        holder.tv_charges.setText(mList.getDelivery_charge());

        holder.rb_select.setChecked(mList.getIscheckd());
        holder.rb_select.setTag(new Integer(position));

        //for default check in first item
        if (position == 0 /*&& mList.getIscheckd() && holder.rb_select.isChecked()*/) {
            holder.rb_select.setChecked(true);
            modelList.get(position).setIscheckd(true);

            lastChecked = holder.rb_select;
            lastCheckedPos = 0;

            location_id = modelList.get(0).getLocation_id();

            gethouse = modelList.get(0).getHouse_no();
            getname = modelList.get(0).getReceiver_name();
            getphone = modelList.get(0).getReceiver_mobile();
            getsocity = modelList.get(0).getSocity_name();
            getpin = modelList.get(0).getPincode();
            getcharge = modelList.get(0).getDelivery_charge();

            ischecked = true;

            Intent updates = new Intent("Grocery_delivery_charge");
            updates.putExtra("type", "update");
            updates.putExtra("charge", getcharge);
            context.sendBroadcast(updates);
        }

        holder.swipeLayout.setShowMode(SwipeLayout.ShowMode.LayDown);

        holder.swipeLayout.addSwipeListener(new SimpleSwipeListener() {
            @Override
            public void onOpen(SwipeLayout layout) {
                //YoYo.with(Techniques.Tada).duration(500).delay(100).playOn(layout.findViewById(R.id.trash));
            }
        });

        holder.swipeLayout.setOnDoubleClickListener(new SwipeLayout.DoubleClickListener() {
            @Override
            public void onDoubleClick(SwipeLayout layout, boolean surface) {
                Toast.makeText(context, "DoubleClick", Toast.LENGTH_SHORT).show();
            }
        });

        holder.buttonDelete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                mItemManger.removeShownLayouts(holder.swipeLayout);
                /*modelList.remove(position);
                notifyItemRemoved(position);
                notifyItemRangeChanged(position, modelList.size());
                mItemManger.closeAllItems();*/

                if(ConnectivityReceiver.isConnected()){
                    makeDeleteAddressRequest(mList.getLocation_id(),position);
                }

            }
        });

        holder.btn_edit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Session_management sessionManagement = new Session_management(context);
                sessionManagement.updateSocity("","");

                Bundle args = new Bundle();
                Fragment fm = new Add_delivery_address_fragment();
                args.putString("location_id",mList.getLocation_id());
                args.putString("name", mList.getReceiver_name());
                args.putString("mobile", mList.getReceiver_mobile());
                args.putString("pincode", mList.getPincode());
                args.putString("socity_id", mList.getSocity_id());
                args.putString("socity_name", mList.getSocity_name());
                args.putString("house", mList.getHouse_no());
                fm.setArguments(args);
                FragmentManager fragmentManager = ((Activity) context).getFragmentManager();
                fragmentManager.beginTransaction().replace(R.id.contentPanel, fm)
                        .addToBackStack(null).commit();
            }
        });

        mItemManger.bindView(holder.itemView, position);
    }

    @Override
    public int getItemCount() {
        return modelList.size();
    }

    public String getlocation_id() {
        return location_id;
    }

    public String getaddress() {
        String address = context.getResources().getString(R.string.reciver_name) + getname + "\n" + context.getResources().getString(R.string.reciver_mobile) + getphone +
                "\n" + context.getResources().getString(R.string.pincode) + getpin +
                "\n" + context.getResources().getString(R.string.house_no) + gethouse +
                "\n" + context.getResources().getString(R.string.socity) + getsocity;

        return address;
    }

    public boolean ischeckd() {
        return ischecked;
    }

    @Override
    public int getSwipeLayoutResourceId(int position) {
        return R.id.swipe;
    }

    /**
     * Method to make json object request where json response starts wtih
     */
    private void makeDeleteAddressRequest(String location_id,final int position) {

        // Tag used to cancel the request
        String tag_json_obj = "json_delete_address_req";

        Map<String, String> params = new HashMap<String, String>();
        params.put("location_id", location_id);

        CustomVolleyJsonRequest jsonObjReq = new CustomVolleyJsonRequest(Request.Method.POST,
                BaseURL.DELETE_ADDRESS_URL, params, new Response.Listener<JSONObject>() {

            @Override
            public void onResponse(JSONObject response) {
                Log.d(TAG, response.toString());

                try {
                    Boolean status = response.getBoolean("responce");
                    if (status) {

                        String msg = response.getString("message");

                        Toast.makeText(context, ""+msg, Toast.LENGTH_SHORT).show();

                        modelList.remove(position);
                        notifyItemRemoved(position);
                        notifyItemRangeChanged(position, modelList.size());
                        mItemManger.closeAllItems();

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
                    Toast.makeText(context, context.getResources().getString(R.string.connection_time_out), Toast.LENGTH_SHORT).show();
                }
            }
        });

        // Adding request to request queue
        AppController.getInstance().addToRequestQueue(jsonObjReq, tag_json_obj);
    }

}
