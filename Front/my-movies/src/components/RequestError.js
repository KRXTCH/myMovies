import "./RequestError.css";

function RequestError({ message }) {
  return (
    <div id="error_message">
      <h1>OOPS</h1>
      <p>{message ?? "Une érreur est survenue..."}</p>
    </div>
  );
}

export default RequestError;
