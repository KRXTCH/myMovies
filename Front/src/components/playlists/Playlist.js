import forlderOpen from "../../asset/icons/folder.svg";

function Playlist({posterPath}) {
    return (
        <div className="playlist_visual">
          <img width={200} height={300} alt="Image de playlist"
            src={`https://image.tmdb.org/t/p/w200${posterPath}`}
          ></img>
          <img className="playlist_icon" src={forlderOpen} />
        </div>
    )
}

export default Playlist;