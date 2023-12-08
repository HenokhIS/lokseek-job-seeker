import React, {useState, useEffer, useEffect} from "react";
import ReactDOM from "react-dom/client";

function Job() {

    const [categories,setCategories] = useState([]);
    const [locations,setLocations] = useState([]);
    const [jobs,setJobs] = useState([]);
    const [locationId, setLocationId] = useState('');
    const [categoryId, setCategoryId] = useState('');
    const [loading,setLoading] = useState(true);
    const [error,setError] = useState('');

    useEffect(() => {
      axios
        .get("api/categories")
        .then((res) => {
        if(res.data.status === 200) {
          setCategories(res.data.categories);
        }
      }).catch((error) => {
          setError(error.response.statusText);
      });
      axios
        .get("api/locations")
        .then((res) => {
        if(res.data.status === 200) {
          setLocations(res.data.locations);
        }
      }).catch((error) => {
          setError(error.response.statusText);
      });
      axios
        .get("api/jobs")
        .then((res) => {
        if(res.data.status === 200) {
          setJobs(res.data.jobs);
        }
        setLoading(false);
      }).catch((error) => {
          setError(error.response.statusText);
          setJobs(res.data.jobs);
      });
    }, []);


    const sortByLocation = (LocationId) => {
      setLocationId(LocationId);
      if(locationId === 'all') {
        axios
        .get("api/jobs")
        .then((res) => {
        if(res.data.status === 200) {
          setJobs(res.data.jobs);
        }
        setLoading(false);
      }).catch((error) => {
          setError(error.response.statusText);
          setJobs(res.data.jobs);
      });
      } else {
        axios
          .get(`api/jobs/location/${LocationId}`)
          .then((res) => {
          if(res.data.status === 200) {
            setJobs(res.data.jobs);
          }
          setLoading(false);
        }).catch((error) => {
            setError(error.response.statusText);
            setJobs(res.data.jobs);
        });
      }
    };

    const sortByCategory = (CategoryId) => {
      setCategoryId(CategoryId);
      if(categoryId === 'all') {
        axios
        .get("api/jobs")
        .then((res) => {
        if(res.data.status === 200) {
          setJobs(res.data.jobs);
        }
        setLoading(false);
      }).catch((error) => {
          setError(error.response.statusText);
          setJobs(res.data.jobs);
      });
      } else {
        axios
          .get(`api/jobs/category/${CategoryId}`)
          .then((res) => {
          if(res.data.status === 200) {
            setJobs(res.data.jobs);
          }
          setLoading(false);
        }).catch((error) => {
            setError(error.response.statusText);
            setJobs(res.data.jobs);
        });
      }
    };

    const handleSubmit = (e) => {
      e.preventDefault();
      axios
        .post(`api/jobs`, {locationId, categoryId})
        .then((res) => {
        if(res.data.status === 200) {
          setJobs(res.data.jobs);
        }
        setLoading(false);
      }).catch((error) => {
          setError(error.response.statusText);
          setJobs(res.data.jobs);
      });
    }

    return (
        <>
        <section className="section search">
            <form action="" onSubmit={handleSubmit} className="search__form">
                <select name="" id="" className="search__select" value={locationId} onChange={(e) => sortByLocation(e.target.value)}>
                    <option value="all">Pilih Lokasi</option>
                    {
                      locations.map((location,index) => (
                        <option value={location.id} key={location.id}>
                          {location.name}
                        </option>
                      ))
                    }
                </select>
                <select name="" id="" className="search__select" value={categoryId} onChange={(e) => sortByCategory(e.target.value)}>
                    <option value="all">Pilih Kategori</option>
                    {
                      categories.map((category,index) => (
                        <option value={category.id} key={category.id}>
                          {category.name}
                        </option>
                      ))
                    }
                </select>
                <button className="search__button">Cari</button>
            </form>
        </section>
        <section className="job section" id="job">
          <div className="job__container container">  
            <div className="job__content grid">
              {loading ? (
              <h3>Loading...</h3>
              ) : error ? (
              <h3>{error}</h3>
              ) : jobs.length === 0 ? (
              <h3>job kosong</h3>
              ) : jobs.map((job,index) => (
                 <article key={job.id} className="job__card">
                 <div className="job__image">
                   <img src={`storage/${job.banner}`} alt="" className="job__img" />
                   <a href={`detail/${job.slug}`} className="job__button">
                     Detail
                   </a>
                 </div>
 
                 <div className="job__data"> 
                   <div className="job__search">
                       <h3 className="job__title">Di cari :{" "} </h3>
                       <span className="job__item">{job.category.name}</span>
                   </div>
                   <div className="job__search">
                       <h3 className="job__title">Lokasi :{" "} </h3>
                       <span className="job__item">{job.location.name}</span>
                   </div>
                   <div className="job__search">
                     <h3 className="job__title">Tags : {" "}</h3>
                     {job.tags.map((tag,index) => (
                       <span key={tag.id} className="job__item">
                        {tag.name}
                       </span>
                     ))}
                     
                 </div>
                   <div className="job__line">
                     <hr />
                     <h3 className="job__title">Kirim Lamaran</h3>
                   <hr />
                   </div>
                   <div className="job__apply">
                     <a target="_blank" href={job.url} className="job__apply-button url"><i className='bx bx-link-external'></i></a>
                     <a href={`mailto:${job.email}`} className="job__apply-button email"><i className='bx bx-envelope' ></i></a>
                     <a target="_blank" href={`https://api.whatsapp.com/send/?phone=${job.no_telp}&text=test`} className="job__apply-button wa"><i className='bx bxl-whatsapp' ></i></a>
                   </div>
                 </div>
             </article>
              ))}
            </div>
          </div>
        </section>
        </>
    );
}

export default Job;

if (document.getElementById('job')) {
    const Index = ReactDOM.createRoot(document.getElementById("job"));

    Index.render(
        <React.StrictMode>
            <Job />
        </React.StrictMode>
    )
}
