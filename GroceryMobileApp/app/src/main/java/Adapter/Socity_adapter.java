package Adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Filter;
import android.widget.Filterable;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

import Model.Socity_model;
import codecanyon.grocery.R;

/**
 * Created by Rajesh Dabhi on 29/6/2017.
 */

public class Socity_adapter extends RecyclerView.Adapter<Socity_adapter.MyViewHolder>
        implements Filterable {

    private List<Socity_model> modelList;
    private List<Socity_model> mFilteredList;

    private Context context;

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView title;

        public MyViewHolder(View view) {
            super(view);
            title = (TextView) view.findViewById(R.id.tv_socity_name);
        }
    }

    public Socity_adapter(List<Socity_model> modelList) {
        this.modelList = modelList;
        this.mFilteredList = modelList;
    }

    @Override
    public Socity_adapter.MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.row_socity_rv, parent, false);

        context = parent.getContext();

        return new Socity_adapter.MyViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(Socity_adapter.MyViewHolder holder, int position) {
        Socity_model mList = modelList.get(position);

        holder.title.setText(mList.getSocity_name());
    }

    @Override
    public int getItemCount() {
        return mFilteredList.size();
    }

    @Override
    public Filter getFilter() {

        return new Filter() {
            @Override
            protected FilterResults performFiltering(CharSequence charSequence) {

                String charString = charSequence.toString();

                if (charString.isEmpty()) {

                    mFilteredList = modelList;
                } else {

                    ArrayList<Socity_model> filteredList = new ArrayList<>();

                    for (Socity_model androidVersion : modelList) {

                        if (androidVersion.getSocity_name().toLowerCase().contains(charString)) {

                            filteredList.add(androidVersion);
                        }
                    }

                    mFilteredList = filteredList;
                }

                FilterResults filterResults = new FilterResults();
                filterResults.values = mFilteredList;
                return filterResults;
            }

            @Override
            protected void publishResults(CharSequence charSequence, FilterResults filterResults) {
                mFilteredList = (ArrayList<Socity_model>) filterResults.values;
                notifyDataSetChanged();

            }
        };
    }


}
