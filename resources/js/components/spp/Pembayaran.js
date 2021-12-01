import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";

function Pembayaran(props) {

    const [siswa, setSiswa] =   useState([]);
    const [cardbody,setCardBody] = useState(false);
    const [hapusCardBody,setHapusCardBody] = useState(true);
    const [nis, setNis]  = useState('');
    
    const [url,setUrl] = useState(props.endpoint);

    const handleInput = (event) => {
        var input = setNis(event.target.value);
        if(nis.length < 2   ){
            setCardBody(false);
        }else{
            setCardBody(true);
        }
    }

       const getSiswa = async (e) => {
           
           try {
               let { data } = await axios.get(url);
               setSiswa(data.data);
         
           } catch (e) {
               console.log(e.message);
           }
       };
    
    const getData = (event) => {

        // event.preventDefault();
        // if(nis == ""){
        //     alert('tidak ada data')
        // }else{
        //     alert(nis);
        // }
    }

    const hapusData = (event) => {
        event.preventDefault();
        setNis('');
        setCardBody(false);
    }
 
    useEffect(() => {
        getSiswa()
      
    },[url])

    return (
        <div className="container mt-3">
            <div className="card">
                <div className="card-header">
                    <h1 className="text-center">{props.title}</h1>
                    <form onSubmit={getSiswa}>
                        <div className="form-group">
                            <label htmlFor="">Masukkan Nomor Induk Siswa</label>
                            <input
                                type="text"
                                id="nis"
                                value={nis}
                                onChange={handleInput}
                    
                                className="form-control"
                                placeholder="masukkan nis..."
                            />
                        </div>
                        <div className="d-flex justify-content-between">
                            <button
                            
                                className="btn btn-info text-white"
                            >
                                Cari
                            </button>
                            <button
                                onClick={hapusData}
                                className="btn btn-danger text-white"
                            >
                                Hapus Pencarian
                            </button>
                        </div>
                    </form>
                </div>
                {cardbody === true ? (
                    <div className="card-body">
                       <h4>Data Siswa</h4>
                       <table>
                           <tr>
                               <th>Nim</th>
                               <td>:</td>
                               <td>{nis}</td>
                           </tr>
                       </table>
                    </div>
                ) : (
                    ""
                )}
            </div>
        </div>
    );
}

export default Pembayaran;
if (document.getElementById("pembayaran-spp")) {
    var item = document.getElementById("pembayaran-spp");
    ReactDOM.render(
        <Pembayaran
            title={item.getAttribute("title")}
            endpoint={item.getAttribute("endpoint")}
        />,
        item
    );
}
